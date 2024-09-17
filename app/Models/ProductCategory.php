<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image_id', 'favorite_flag', 'description', 'user_id'];
    protected $appends = ['products_count'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id', 'id');
    }

    public function getProductsCountAttribute()
    {
        return $this->belongsToMany(Product::class)->count();
    }
}
