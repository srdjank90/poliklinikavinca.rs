<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'meta_data',
        'single_price',
        'total_price',
        'currency',
        'avans_price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class)->withTrashed();
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function singlePriceFormated()
    {
        $formated = number_format($this->single_price, 2, ',', '.');
        return $formated;
    }

    public function totalPriceFormated()
    {
        $formated = number_format($this->total_price, 2, ',', '.');
        return $formated;
    }
}
