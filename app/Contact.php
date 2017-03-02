<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function notify_groups()
    {
    	return $this->belongsToMany(NotifyGroup::class);
    }
}
