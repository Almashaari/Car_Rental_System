<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rented extends Model
{
    public function car()
    {
        return $this->hasOne(mycar::class, 'id', 'car_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}