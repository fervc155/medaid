<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //Atributos modificables
    protected $fillable = [
        'name', 'is_admin', 'email', 'password',
    ];

    //Atributos ocultos
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Método para determinar si el usuario es de tipo administrador
    public function isAdmin()
    {
        return $this->is_admin;
    }
}
