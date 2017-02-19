<?php

namespace App;

use App\Traits\UserRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UserRoles;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tasklist()
    {
        return $this->hasMany(Tasklist::class);
    }
}
