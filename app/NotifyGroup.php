<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifyGroup extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function task_lists()
    {
        return $this->belongsToMany(TaskList::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }
}
