<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NotifyGroup;

class NotifyEmail extends Model
{
    protected $fillable = [
        'notify_group_id', 'name', 'email'
    ];

    public function notify_group()
    {
        return $this->belongsTo(NotifyGroup::class);
    }
}
