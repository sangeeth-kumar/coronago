<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $fillable = [
    	'name', 'email', 'mob', 'country_id', 'region_id','city_id', 'city_code','donation_type','donation_material', 'created_at', 'updated_at'
    ];

    public function country() {
    	return $this->belongsTo('App\Country');
    }

    public function region() {
    	return $this->belongsTo('App\Region');
    }

    public function city() {
    	return $this->belongsTo('App\City');
    }
}
