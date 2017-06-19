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
}
