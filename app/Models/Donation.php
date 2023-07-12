<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, SoftDeletes; 

    public function campaign(){
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function organization(){
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }


    public function currancy(){
        return $this->belongsTo(Currancy::class, 'currancy_id');
    }

    
}
