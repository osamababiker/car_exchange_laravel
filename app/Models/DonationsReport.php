<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DonationsReport extends Model
{
    use HasFactory, SoftDeletes;

    public function campaign(){
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}
