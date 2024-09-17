<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'price', 'price_avans', 'avans_activate', 'currency', 'highlighted', 'featured', 'status', 'user_id', 'expire_at', 'published_at', 'external_id'];

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meta()
    {
        return $this->hasMany(ProductMeta::class);
    }

    public function seo()
    {
        return $this->hasOne(SeoMetaTag::class, 'model_id')->where('model', 'Product');
    }
}
