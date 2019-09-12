<?php

namespace App\Notifications;

use App\ButtonClick;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LowBattery extends Notification
{
    use Queueable;

    private $buttonClick;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ButtonClick $buttonClick)
    {
        $this->buttonClick = $buttonClick;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->error()
            ->subject("Low Battery {$this->buttonClick->button->serial}")
            ->line("Battery Level: {$this->buttonClick->battery_level}")
            ->line("Company: {$this->buttonClick->company->company}")
            ->line("Branch: {$this->buttonClick->branch->branch}")
            ->line("Identifier: {$this->buttonClick->button->identifer}")
            ->line("Low Battery: {$this->buttonClick->button->serial}")
            ->action('View Button', url('/admin/resources/buttons/'.$this-$this->buttonClick->button_id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
