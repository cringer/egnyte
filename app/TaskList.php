<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_group_id', 'notify_group_id', 'name', 'icon'
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function position()
    {
        return $this->hasOne(Position::class);
    }

    public function notify_group()
    {
        return $this->hasOne(NotifyGroup::class);
    }
}
