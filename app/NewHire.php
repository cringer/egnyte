<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewHire extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'position_id', 'status_id', 'location_id', 'hire_date'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
