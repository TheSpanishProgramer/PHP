<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'adm', "user_id"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function selectAllFromUser($user){
//        return  User::where('user_id', $user->id)->orderBy('name')->get();
        return DB::table('users')->where('user_id', '=', $user->id)->orderBy('name')->get();
    }

    public function permissionsUser(){
        return $this->hasMany(PermissionUser::class);
    }

}
