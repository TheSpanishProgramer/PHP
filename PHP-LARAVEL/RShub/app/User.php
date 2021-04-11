<?php

namespace App;

use App\Role;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;

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

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

//    public function roles(){
//        return $this->hasMany(Role::class);
//    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    public function assignRole(Role $role)
    {
        return $this->roles()->save($role);
    }
//
//    public function hasAnyRole($roles){
//
//        if (is_array($roles)){
//            foreach ($roles as $role){
//                if($this->hasRole($role)) {
//                    return true;
//                }
//            }
//        } else {
//            if($this->hasRole($roles)) {
//                return true;
//            }
//        }
//
//        return false;
//    }
//
//    public function hasRole($role){
//        if ($this->roles()->where('name', $role)->first()) {
//            return true;
//        }
//        return false;
//    }

    public function hasRole($name){
        foreach ($this->roles as $role)
        {
            if ($role->name == $name) return true;
        }
        return false;
    }


}
