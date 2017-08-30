<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the tasks for the tasklist.
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
