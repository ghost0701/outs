<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;


    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'menu_slider')
            ->orderBy('name');
    }

}
