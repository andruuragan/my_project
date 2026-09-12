<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'name',

        'overview',
        'advantages',
        'usage',
        'why_choose_us',
        'additional_info',

        'overview_ru',
        'advantages_ru',
        'usage_ru',
        'why_choose_us_ru',
        'additional_info_ru',
    ];

    public function catalogs()
    {
        return $this->hasMany(Catalog::class);
    }
}