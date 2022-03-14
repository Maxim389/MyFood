<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'price',
        'weight',
        'restaurant_id'
    ];


    public function restaurant()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restaurant_id')->first()->name;
    }
}
