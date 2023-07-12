<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    public function organizations(){
        return $this->hasMany(Organization::class, 'country_id');
    }

    public function campaigns(){
        return $this->hasMany(Campaign::class, 'country_id');
    }
}
