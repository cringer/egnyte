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
        'user_id', 'name'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }
}
