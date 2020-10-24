<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    protected $hidden = [
        'password', 'remember_token','created_at','updated_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at'];
    
    public function persons()
    {
        return $this->hasMany('App\Person');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
