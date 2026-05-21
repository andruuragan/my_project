<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder create(array $attributes = [])
 */
class Catalog extends Model
{

    protected $table = 'catalog';

    protected $fillable = [
        'name',
        'type',
        'thickness',
        'grade',
        'diameter',
        'casing',
        'chimneyType',
        'price',
        'image',
        'image_hash',
        'description_id',// ← ОБЯЗАТЕЛЬНО

    ];
    protected $casts = [
        'price' => 'float',
        'grade' => 'integer',
    ];

    public $timestamps = false;

    public function description()
    {
        return $this->belongsTo(Description::class);
    }
    public function likedByUsers()
    {
        // Товар лайкнутий багатьма користувачами
        return $this->belongsToMany(User::class, 'wishlists', 'catalog_id', 'user_id')->withTimestamps();
    }
}
