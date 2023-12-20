<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
