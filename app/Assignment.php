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
    public function newhires()
    {
    	return $this->hasMany('App\NewHire');
    }
}
