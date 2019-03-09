<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Atelier;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function alteliers()
    {
        return $this->belongsToMany(Atelier::class)->withTimestamps();
    }

    public function getAdminAttribute()
    {
        return $this->roles->first()->label === 'Admin';
    }

    public function getCuisinierAttribute()
    {
        return $this->roles->first()->label === 'cuisinier';
    }

    public function getParticulierAttribute()
    {
        return $this->roles->first()->label === 'particulier';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
