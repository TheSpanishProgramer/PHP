<?php

namespace App\Http\Controllers;

use App\Permission;
use App\PermissionUser;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function index(){

        return view('user.index')->with('users', \App\User::selectAllFromUser(Auth::user()));
    }

    public function add(Request $post){

        $this->validate($post, [
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required'
        ]);

        $post_data = $post->all();

        User::create([
            "name" => $post_data['name'],
            "email" => $post_data['email'],
            "password" => bcrypt($post_data['password']),
            "adm" => false,
            "user_id" => Auth::user()->id
        ]);

        return back();
    }

    public function delete(User $user){
        $user->delete();

        return back();
    }

    public function edit(User $user){
        return view("user.edit")->with("user", $user);
    }

    public function update(User $user, Request $patch){

        $this->validate($patch, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $patch_data = $patch->all();

        $user->update([
            "name" => $patch_data['name'],
            "email" => $patch_data['email'],
            "adm" => (!empty($patch_data['adm']) ? true : false)
        ]);

        return redirect("/user");
    }

    public function permission(User $user){
        return view("user.permission", [
            "user" => $user,
            "permissions" => Permission::all(),
            "PermissionUser" => $user->permissionsUser()
        ]);
    }

    public function permission_set($user, Request $post){

        $post_data = $post->all();
        $permissionUser = new PermissionUser();

        foreach($post_data as $key => $permission){

            if($key == "send" || $key == "_token")
                continue;

            $permissionUser->delete_permission_user($user, $key);

            if(!$permission)
                $permissionUser->insert_permission_user($user, $key);


        }

        return redirect("/user");

    }
}
