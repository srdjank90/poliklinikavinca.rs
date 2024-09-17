<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductField extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'type', 'attr_class', 'attr_id', 'attr_name', 'options'];
}
