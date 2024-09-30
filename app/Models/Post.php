<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'image_id', 'toc', 'highlighted', 'footer_display', 'menu_display', 'product_single_display', 'content', 'excerpt', 'status', 'user_id', 'expiry_date', 'published_at'];
    protected $appends = ['excerpt'];
    public function categories()
    {
        return $this->belongsToMany(PostCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id', 'id');
    }

    public function seo()
    {
        return $this->hasOne(SeoMetaTag::class, 'model_id')->where('model', 'Post');
    }

    public function getExcerptAttribute2()
    {
        return substr(strip_tags($this->content), 0, 215) . '...';
    }

    public function getExcerptAttribute()
    {
        $cleanedContent = strip_tags($this->content);
        $excerpt = mb_substr($cleanedContent, 0, 215);
        if (mb_strlen($cleanedContent) > 215) {
            $excerpt .= '...';
        }

        return $excerpt;
    }
}
