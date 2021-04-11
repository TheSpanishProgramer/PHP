<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $table = "permissions.permissions";

    public function PermissionsUser(){
        return $this->hasMany(PermissionUser::class);
    }
}
