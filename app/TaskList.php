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
        'task_group_id', 'notify_group_id', 'user_id', 'name', 'icon'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task_group()
    {
        return $this->belongsTo(TaskGroup::class);
    }

    public function notify_group()
    {
        return $this->hasOne(NotifyGroup::class);
    }
}
