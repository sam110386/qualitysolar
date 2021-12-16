<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class DataChangeEmailNotification extends Notification
{
    use Queueable;

    public function __construct($data)
    {
        $this->data = $data;
        $this->lead = $data['lead'];
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage)
            ->subject($this->data['action'])
            ->greeting('Hi,')
            ->line($this->data['action'])
            ->line("Customer: ".$this->lead->author_name) 
            ->line("Lead name: ".$this->lead->title)
            ->line("Brief description: ".Str::limit($this->lead->content, 200))
            ->action('View full lead', route('admin.leads.show', $this->lead->id))
            ->line('Thank you')
            ->line(config('app.name') . ' Team')
            ->salutation(' ');
    }
}
