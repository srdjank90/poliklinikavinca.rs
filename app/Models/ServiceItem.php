<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'name', 'description', 'price', 'discount'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function image()
    {
        return $this->belongsTo(File::class, 'image_id', 'id');
    }
}
