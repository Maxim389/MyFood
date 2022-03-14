<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'dish_id',
        'user_id',
        'count',
        'order_id'
    ];
}
