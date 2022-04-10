<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'title',
        'carbrand_id',
    ];

    public function carbrand()
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function Product()
    {
        return $this->belongsToMany(Product::class);
    }
}
