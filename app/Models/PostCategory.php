<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'user_id'];
    protected $appends = ['posts_count'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getPostsCountAttribute()
    {
        return $this->belongsToMany(Post::class)->count();
    }
}
