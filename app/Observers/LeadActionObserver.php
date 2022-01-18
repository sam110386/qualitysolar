<?php

namespace App\Observers;

use App\Notifications\DataChangeEmailNotification;
use App\Notifications\AssignedLeadNotification;
use App\Models\Lead;
use Illuminate\Support\Facades\Notification;

class LeadActionObserver
{
    public function created(Lead $model)
    {
        $data  = ['action' => 'New lead has been created!', 'model_name' => 'Lead', 'lead' => $model];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Lead $model)
    {
        if ($model->isDirty('assigned_to_user_id')) {
            $user = $model->assigned_to_user;
            if ($user) {
                Notification::send($user, new AssignedLeadNotification($model));
            }
        }
    }
}
