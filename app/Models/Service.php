<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'title', 'subtitle', 'description', 'appointment', 'content', 'image_id', 'discount'];

    public function items()
    {
        return $this->hasMany(ServiceItem::class);
    }

    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class);
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id', 'id');
    }

    public function seo()
    {
        return $this->hasOne(SeoMetaTag::class, 'model_id')->where('model', 'Service');
    }
}
