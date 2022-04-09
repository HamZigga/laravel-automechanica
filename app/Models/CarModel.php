<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function carbrand()
    {
        return $this->belongsTo(CarBrand::class);
    }
}
