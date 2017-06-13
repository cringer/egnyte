<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
	/**
	 * Get the vendor of the equipment.
	 */
    public function vendor()
    {
    	return $this->belongsTo('App\Vendor');
    }

    /**
     * Get the equipment type.
     */
    public function equipmentType()
    {
    	return $this->belongsTo('App\EquipmentType');
    }
}
