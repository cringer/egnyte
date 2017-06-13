<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
	/**
	 * Get the equipment of specified type.
	 */
	public function equipment()
    {
    	return $this->hasMany('App\Equipment');
    }
}
