<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResidentialLeadNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $return = (new MailMessage)
            ->subject('You have new Vehya Residential lead')
            ->greeting('Hi,');
        $commercialQuest = config('product.residential_questions');
        $i = 1;
        foreach ($this->lead as $key => $dt) {
            if (!isset($commercialQuest[$key])) continue;
            $return->line($i++ . '. ' . $commercialQuest[$key]['title'] . ': ' . (is_array($dt) ? implode(',', $dt) : $dt));
        }
        // ->line('You have been assigned a new lead: ' . $this->lead['some_basic_info'])
        //->action('View lead', route('admin.leads.show', $this->lead['vehicles_be_charging_at_once']))
        return $return->line('Thank you')
            ->line(config('app.name') . ' Team')
            ->salutation(' ');
    }
}
