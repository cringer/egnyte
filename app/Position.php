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
        return $this->hasMany(NewHire::class);
    }
    
    /**
     * The tasklists that belong to the position.
     */
    public function task_lists()
    {
        return $this->belongsToMany(TaskList::class);
    }
}
