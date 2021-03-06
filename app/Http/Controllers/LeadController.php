<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Notifications\CommentEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    use MediaUploadingTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'author_name'   => 'required',
            'author_email'  => 'required|email',
        ]);

        $request->request->add([
            'category_id'   => 1,
            'status_id'     => 1,
            'priority_id'   => 1
        ]);

        $ticket = Lead::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $ticket->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        return redirect()->back()->withStatus('Your ticket has been submitted, we will be in touch. You can view ticket status <a href="' . route('tickets.show', $ticket->id) . '">here</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        $lead->load('comments');

        return view('leads.show', compact('lead'));
    }

    public function storeComment(Request $request, Lead $lead)
    {
        $request->validate([
            'comment_text' => 'required'
        ]);

        $comment = $lead->comments()->create([
            'author_name'   => $lead->author_name,
            'author_email'  => $lead->author_email,
            'comment_text'  => $request->comment_text
        ]);

        $lead->sendCommentNotification($comment);

        return redirect()->back()->withStatus('Your comment added successfully');
    }
}
