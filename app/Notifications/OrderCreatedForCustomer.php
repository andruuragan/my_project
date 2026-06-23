<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreatedForCustomer extends Notification
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

   public function toMail($notifiable)
{
    $mail = (new MailMessage)
        ->subject('Дякуємо за замовлення №' . $this->order->id)
        ->greeting('Доброго дня!')
        ->line('Дякуємо за ваше замовлення в DymSystems.')
        ->line('Номер замовлення: #' . $this->order->id)
        ->line('Сума: ' . number_format($this->order->total_price, 0, '.', ' ') . ' грн');

    // 👉 Добавляем товары
    foreach ($this->order->items as $item) {
        $mail->line(
            $item->product_name .
            ' × ' . $item->quantity .
            ' = ' . number_format($item->total, 0, '.', ' ') . ' грн'
        );
    }

    return $mail
        ->line('Ми вже почали обробку замовлення.')
        ->action('Перейти до каталогу', url('/dymohody-ta-komplektuyuchi'))
        ->line('Якщо у вас є питання — ми завжди на зв’язку.');
}
}