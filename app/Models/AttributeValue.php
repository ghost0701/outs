<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;


    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_attribute_value');
    }
}
