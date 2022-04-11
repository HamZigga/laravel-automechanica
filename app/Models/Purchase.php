<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'is_active',
        'is_ready',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function statement() {
        return $this->belongsToMany(Statement::class);
    }
}
