<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'menu_brand')
            ->orderBy('name');
    }
}
