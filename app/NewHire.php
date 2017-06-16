<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewHire extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function assigned()
    {
        return $this->belongsTo('App\Assignment');
    }

    // public function location()
    // {
    //     return $this->belongsTo(Location::class);
    // }

    // public function status()
    // {
    //     return $this->belongsTo(Status::class);
    // }
}
