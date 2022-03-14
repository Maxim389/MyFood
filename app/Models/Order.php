<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'totalprice',
        'address',
        'status_id',
        'payStatus_id'
    ];

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id')->first()->name;
    }

    public function payStatus()
    {
        return $this->hasOne(PayStatus::class, 'id', 'payStatus_id')->first()->name;
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first()->name;
    }

}
