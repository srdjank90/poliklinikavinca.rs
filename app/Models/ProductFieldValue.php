<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFieldValue extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'product_field_id', 'value'];
}
