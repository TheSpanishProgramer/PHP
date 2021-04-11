<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/user')->with('success', 'El usuario ha sido eliminado con exito');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|exists:roles,id'
        ]);

        User::create($request->all())->assignRole(Role::where('id', $request->role)->get());

        return redirect()->route('admin.user.create')->with('success', 'El usuario ha sido creado con exito.');
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user->id), 'max:255'],
            'password' => '',
            'role' => 'required|exists:roles,id'
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $role = $data['role'];
        unset($data['role']);

        $user->update($data);
        $user->removeRole($user->getRoleNames()[0]);
        $user->assignRole(Role::where('id', $role)->get());

        return redirect()->route('admin.user.edit', $user)->with('success', 'El usuario ha sido editado correctamente');
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.user.update', compact('user', 'roles'));
    }
}
