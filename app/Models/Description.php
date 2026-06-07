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

    ];

    public function catalogs()
    {
        return $this->hasMany(Catalog::class);
    }
}
