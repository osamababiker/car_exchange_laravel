<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bid extends Model
{
    use HasFactory, SoftDeletes;

    public function car(){
        return $this->belongsTo(Car::class, 'carId');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userId');
    }
}
