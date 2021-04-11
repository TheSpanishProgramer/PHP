<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PermissionUser extends Model
{

    protected $table = "permissions.permissions_users";

    public function insert_permission_user($user_id, $permission_id){
        return DB::table('permissions.permissions_users')->insert([
            ['user_id' => $user_id, 'permission_id' => $permission_id]
        ]);
    }

    public function delete_permission_user($user_id, $permission_id){
        return DB::table('permissions.permissions_users')->where([
            ['user_id', "=", $user_id],
            ['permission_id', "=", $permission_id],
        ])->delete();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Permission(){
        return $this->belongsTo(Permission::class);
    }
}
