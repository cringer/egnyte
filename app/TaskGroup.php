<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position_id', 'name'
    ];

    public function task_lists()
    {
        return $this->hasMany(TaskList::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
