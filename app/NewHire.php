<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewHire extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }

    public function activeTasks()
    {
        return $this->hasMany(ActiveTask::class);
    }
}
