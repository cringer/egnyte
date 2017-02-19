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
    protected $fillable = [];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
