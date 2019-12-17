<?php

namespace App\Notifications\DonationRequests;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationRequestCreated extends Notification
{
    use Queueable;

    protected $donationRequest;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($donationRequest)
    {
        $this->donationRequest = $donationRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'يوجد طلب تبرع بالقرب منك',
            'description' => $this->donationRequest->owner->name . " يريد تبرع بالقرب منك",
        ];
    }
}
