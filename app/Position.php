<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['task_group_id', 'title', 'slug', 'color'];

    protected function task_list()
    {
        return $this->hasMany(TaskList::class);
    }
}
