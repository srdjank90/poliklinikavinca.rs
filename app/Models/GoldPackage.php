<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldPackage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'price', 'price_dynamic', 'dynamic_price_activate', 'exire_at'];


    // All products assosiated with gold package
    public function products()
    {
        return $this->belongsToMany(Product::class, 'gold_package_products', 'gold_package_id', 'product_id');
    }
}
