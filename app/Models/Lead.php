<?php

namespace App\Models;

use App\Scopes\AgentScope;
use App\Traits\Auditable;
use App\Notifications\CommentEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Lead extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable;

    public $table = 'leads';

    protected $appends = [
        'attachments',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fname',
        'lname',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'email',
        'category_id',
        'phone',
        'questions',
        'assigned_to_user_id',
        'ev_charger_type',
        "make",
        "model"
    ];

    public static function boot()
    {
        parent::boot();

        Lead::observe(new \App\Observers\LeadActionObserver);

        static::addGlobalScope(new AgentScope);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'lead_id', 'id');
    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /*public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }*/

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to_user_id');
    }

    public function scopeFilterLeads($query)
    {
        $query/*->when(request()->input('priority'), function($query) {
                $query->whereHas('priority', function($query) {
                    $query->whereId(request()->input('priority'));
                });
            })*/
            ->when(request()->input('category'), function ($query) {
                $query->whereHas('category', function ($query) {
                    $query->whereId(request()->input('category'));
                });
            })
            ->when(request()->input('status'), function ($query) {
                $query->whereHas('status', function ($query) {
                    $query->whereId(request()->input('status'));
                });
            });
    }

    public function sendCommentNotification($comment)
    {
        $users = \App\Models\User::where(function ($q) {
            $q->whereHas('roles', function ($q) {
                return $q->where('title', 'Agent');
            })
                ->where(function ($q) {
                    $q->whereHas('comments', function ($q) {
                        return $q->whereLeadId($this->id);
                    })
                        ->orWhereHas('leads', function ($q) {
                            return $q->whereId($this->id);
                        });
                });
        })
            ->when(!$comment->user_id && !$this->assigned_to_user_id, function ($q) {
                $q->orWhereHas('roles', function ($q) {
                    return $q->where('title', 'Admin');
                });
            })
            ->when($comment->user, function ($q) use ($comment) {
                $q->where('id', '!=', $comment->user_id);
            })
            ->get();
        $notification = new CommentEmailNotification($comment);

        Notification::send($users, $notification);
        if ($comment->user_id && $this->author_email) {
            Notification::route('mail', $this->author_email)->notify($notification);
        }
    }
}
