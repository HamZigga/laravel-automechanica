<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'summ',
        'name',
        'surname',
        'phone',
        'email',
    ];

    public function purchase() {
        return $this->belongsToMany(Purchase::class);
    }
}
