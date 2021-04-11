<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes; // Permite hacer la eliminación lógica del User.

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

    // Este accesor crear una modificación de acceso al campo role, en vez de 0 a is_admin por convención
    public function getIsAdminAttribute(){ 
        return $this->role == 0;
    }

    // Este accesor crear una modificación de acceso al campo role, en vez de 2 a is_client por convención
    public function getIsClientAttribute(){
        return $this->role == 2;
    }    
}
