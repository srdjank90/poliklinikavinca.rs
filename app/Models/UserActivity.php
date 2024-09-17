<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'action',
        'ip',
        'platform',
        'user_id'
    ];
}
