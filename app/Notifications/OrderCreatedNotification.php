<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;

    // Передаем модель заказа в конструктор
    public function __construct($order)
    {
        $this->order = $order;
    }

    // Говорим Laravel, что отправка пойдет через Telegram-канал
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    // Формируем само сообщение для Telegram
    public function toTelegram($notifiable)
    {
        // Формируем список товаров строками
        $itemsList = "";
        foreach ($this->order->items as $item) {
            $productName = $item->product->name ?? 'Товар';
            $itemsList .= "• {$productName} x {$item->quantity} шт. — " . number_format($item->price, 0, '.', ' ') . " грн\n";
        }

        // Собираем имя клиента
        $clientName = $this->order->user->name ?? 'Гість';
        $clientEmail = $this->order->user->email ?? 'Не вказано';

        return TelegramMessage::create()
            // Кому отправить (id чата подтянется автоматически)
            ->to($notifiable->routeNotificationFor('telegram', $this))
            // Текст сообщения с поддержкой жирного шрифта *текст*
            ->line("📦 *Нове замовлення №{$this->order->id}*")
            ->line("----------------------------------")
            ->line("👤 *Клієнт:* {$clientName}")
            ->line("📧 *Email:* {$clientEmail}")
            ->line("💰 *Сума замовлення:* " . number_format($this->order->total_price, 0, '.', ' ') . " грн")
            ->line("")
            ->line("🛒 *Склад замовлення:*")
            ->line($itemsList)
            ->line("----------------------------------")
            // Добавим красивую кнопку со ссылкой на просмотр этого заказа в админке
            ->button('Переглянути в адмінці', route('profile.orders.show', $this->order->id));
    }
}
