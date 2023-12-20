<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    protected $hidden = ['pivot'];


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'menu_gender')
            ->orderBy('name');
    }


    public function getName()
    {
        $locale = app()->getLocale();
        if ($locale == 'ru') {
            return $this->name_ru ?: $this->name;
        } else {
            return $this->name;
        }
    }
}
