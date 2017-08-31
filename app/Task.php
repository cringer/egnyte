<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the tasklist for the task.
     */
    public function tasklist()
    {
        return $this->belongsTo('App\TaskList')->orderBy('order');
    }
}
