<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function new_hires()
    {
        return $this->hasMany(NewHires::class);
    }
    
    protected function task_lists()
    {
        return $this->belongsToMany(TaskList::class);
    }
}
