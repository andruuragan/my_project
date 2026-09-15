<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogGeometry extends Model
{
    protected $fillable = [
        'name',
        'parameters',
        'image_hash',
    ];

    protected $casts = [
        'parameters' => 'array',
    ];
    public function catalogs()
    {
        return $this->hasMany(Catalog::class);
    }
}