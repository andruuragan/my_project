<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class ContactFormNotification extends Notification
{
    use Queueable;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

 public function toTelegram($notifiable)
{
    return TelegramMessage::create()
    ->to($notifiable->routeNotificationFor('telegram', $this))
    ->line("📩 Нове повідомлення з форми контактів")
    ->line("👤 Ім'я: {$this->data['name']}")
    ->line("📞 Телефон: {$this->data['phone']}")
    ->line("📧 Email: {$this->data['email']}")
    ->line("📝 Повідомлення:")
    ->line($this->data['message']);
}
}