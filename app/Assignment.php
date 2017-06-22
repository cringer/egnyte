<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

	/**
	 * Get the newhires with assignments.
	 */
    public function newhire()
    {
    	return $this->hasOne('App\NewHire');
    }

    /**
     * Get the methods with assignments.
     */
    public function method()
    {
        return $this->belongsTo('App\AssignmentMethod');
    }

    /**
     * Get the order for this assignment
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
