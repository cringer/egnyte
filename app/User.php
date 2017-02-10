<?php

namespace App;

use App\Traits\UserRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UserRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'hostname',
    ];

    public function tasklist()
    {
        return $this->hasMany(Tasklist::class);
    }
}
