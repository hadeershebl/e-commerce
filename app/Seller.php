<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seller';

    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
