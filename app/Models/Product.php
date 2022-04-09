<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'brand',
        'description',
        'price',
        'quantity',
    ];

    public function producttype()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function busket()
    {
        return $this->belongsToMany(Busket::class);
    }
}
