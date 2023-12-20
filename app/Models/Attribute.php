<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;


    public function attributeValues(): HasMany
    {
        return $this->hasMany(AttributeValue::class)
            ->orderBy('sort_order')
            ->orderBy('name');
    }
}
