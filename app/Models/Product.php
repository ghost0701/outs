<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }


    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }


    public function color(): BelongsTo
    {
        return $this->belongsTo(AttributeValue::class, 'color_id');
    }


    public function discountMenu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'discount_menu_id');
    }


    public function popularMenu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'popular_menu_id');
    }


    public function favoriteMenu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'favorite_menu_id');
    }


    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }


    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_value')
            ->orderByPivot('sort_order')
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


    public function hasDiscount()
    {
        return $this->has_discount ? true : false;
    }


    public function discountPrice()
    {
        return number_format($this->discount_price, 2, '.', ' ');
    }


    public function sellPrice()
    {
        return number_format($this->sell_price, 2, '.', ' ');
    }
}
