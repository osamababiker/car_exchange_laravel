<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory, SoftDeletes;

    public function campaigns(){
        return $this->hasMany(Campaign::class, 'organization_id');
    }

    public function donations(){
        return $this->hasMany(Donation::class, 'organization_id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
}
