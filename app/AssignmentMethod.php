<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentMethod extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the assignments with the assignment method.
     */
    public function assignments()
    {
        return $this->belongsTo('App\Assignment');
    }    
}
