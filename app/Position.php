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

    public function newHires()
    {
        return $this->hasMany(NewHire::class)->withTimestamps();
    }

    /**
     * The tasklists that belong to the position.
     */
    public function taskLists()
    {
        return $this->belongsToMany(TaskList::class);
    }
}
