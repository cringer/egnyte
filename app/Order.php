<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    // public function position()
    // {
    //     return $this->belongsTo(Position::class);
    // }
    
    /**
     * Get the order status of the order.
     */
    // public function order()
    // {
    //     return $this->hasMany('App\Equipment');
    // }

    /**
     * Get the order status of the order
     */
    public function order_status()
    {
        return $this->belongsTo('App\OrderStatus');
    }

    /**
     * Get the assignment of the order.
     */
    public function assignment()
    {
        return $this->belongsTo('App\Assignment');
    }

    /**
     * Get the equipment in the order.
     */
    public function equipment()
    {
        return $this->belongsTo('App\Equipment');
    }
}
