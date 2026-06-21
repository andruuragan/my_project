<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Конструктор принимает объект созданного заказа
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Через какие каналы отправлять (выбираем Телеграм)
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Формирование красивого сообщения для Телеграм
     */
    /**
     * Формирование красивого сообщения для Телеграм
     */
    public function toTelegram($notifiable)
    {
        $itemsList = "";
        // Бежим по товарам из связи order->items
        foreach ($this->order->items as $item) {
            $itemsList .= "• {$item->product_name} x {$item->quantity} шт. — " . number_format($item->price, 0, '.', ' ') . " грн\n";
        }

        // Получаем данные клиента (авторизованного или гостя)
        $customerName = auth()->user()->name ?? 'Гість';
        $customerEmail = auth()->user()->email ?? 'Не вказано';
        
        // 🔥 Достаем телефон: сначала у залогиненного юзера, если нет — пишем "Не вказано"
        $customerPhone = auth()->user()->phone ?? 'Не вказано'; 
        
        $totalPrice = number_format($this->order->total_price, 0, '.', ' ');

        return TelegramMessage::create()
            ->to($notifiable->routeNotificationFor('telegram', $this))
            ->line("📦 *Нове замовлення №{$this->order->id}*")
            ->line("----------------------------------")
            ->line("👤 *Клієнт:* {$customerName}")
            ->line("📞 *Телефон:* {$customerPhone}") // <-- Вот она, новая строчка с телефоном!
            ->line("📧 *Email:* {$customerEmail}")
            ->line("💰 *Сума замовлення:* {$totalPrice} грн")
            ->line("")
            ->line("🛒 *Склад замовлення:*")
            ->line($itemsList)
            ->line("----------------------------------")
            ->button('Переглянути в адмінці', route('profile.orders.show', $this->order->id));
    }
}
