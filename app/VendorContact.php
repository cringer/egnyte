<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorContact extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the vendor that belongs to the contact.
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }
}
