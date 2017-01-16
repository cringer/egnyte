<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifyGroup extends Model
{
    protected $fillable = [
        'task_list_id', 'name'
    ];

    public function task_list()
    {
        return $this->belongsTo(TaskList::class);
    }

    public function notify_emails()
    {
        return $this->hasMany(NotifyEmail::class);
    }
}
