<?php

namespace App\Notifications\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequest extends Notification
{
    use Queueable;

    protected $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($token)
     {
        $this->token = $token;
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
        $url = apiUrl('auth/password/find/' . $this->token);
        return (new MailMessage)
            ->line('لقد طلبت تغيير كلمة مرور حسابك. اضغط على الرابط لاعادة تعيينها مرة اخرى')
            ->action('إعادة تعيين كلمة السر الخاصة بى', url($url))
            ->line('اذا حصلت على هذه الرسالة بالخطأ برجاء تجاهلها!');
    }
}
