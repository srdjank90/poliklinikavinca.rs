<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'service_id', 'slug', 'area', 'image_id', 'content', 'education', 'experience', 'email', 'phone'];

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id', 'id');
    }

    public function seo()
    {
        return $this->hasOne(SeoMetaTag::class, 'model_id')->where('model', 'Doctor');
    }
}
