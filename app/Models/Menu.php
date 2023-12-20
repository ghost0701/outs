<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    public function discountProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'discount_menu_id')
            ->inRandomOrder();
    }


    public function popularProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'popular_menu_id')
            ->inRandomOrder();
    }


    public function favoriteProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'favorite_menu_id')
            ->inRandomOrder();
    }


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'menu_category')
            ->orderBy('name');
    }


    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'menu_brand')
            ->orderByPivot('sort_order')
            ->orderBy('name');
    }


    public function genders(): BelongsToMany
    {
        return $this->belongsToMany(Gender::class, 'menu_gender')
            ->orderBy('id');
    }


    public function sliders(): BelongsToMany
    {
        return $this->belongsToMany(Slider::class, 'menu_slider')
            ->orderByPivot('sort_order')
            ->orderBy('id', 'desc');
    }


    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
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
