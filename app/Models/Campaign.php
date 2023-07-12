<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;
 
    public function currancy(){
        return $this->belongsTo(Currancy::class, 'currancy_id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function organization(){
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function donations(){
        return $this->hasMany(Donation::class, 'campaign_id');
    }

    public function donationsReport(){
        return $this->hasMany(DonationsReport::class, 'campaign_id');
    }
    
}
