<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
	/**
	 * Get the equipment for the vendor.
	 */
    public function equipment()
    {
    	return $this->hasMany('App\Equipment');
    }
}
