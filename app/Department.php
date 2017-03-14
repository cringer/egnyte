<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function new_hires()
    {
        return $this->hasMany(NewHire::class);
    }
    
    /**
     * The positions that belong to the department.
     */
    public function positions()
    {
        return $this->hasMany('Position::class');
    }
}
