<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed role
 * @property mixed nonprofit
 * @property mixed applications
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
         return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function nonprofit()
    {
        return $this->hasOne(Nonprofit::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}

