<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

	/**
	 * Get the orders with the order status.
	 */
    public function orders()
    {
    	return $this->hasMany('App\Orders');
    }    
}
