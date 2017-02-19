<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifyEmail extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function notify_group()
    {
        return $this->belongsToMany(NotifyGroup::class);
    }
}
