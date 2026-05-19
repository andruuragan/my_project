<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model


{
    const STATUS_PENDING = 'pending';
    const STATUS_PAID = 'paid';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELED = 'canceled';

    public static function statuses(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_PAID,
            self::STATUS_PROCESSING,
            self::STATUS_SHIPPED,
            self::STATUS_COMPLETED,
            self::STATUS_CANCELED,
        ];
    }
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];

    // Заказ принадлежит пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // У заказа много товаров
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
