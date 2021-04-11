<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Laracasts\Flash\Flash;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(10);
        return view('admin.users.index')->with('users',$users);
    }
    public function digitadores()
    {
        $users = User::orderBy('id','ASC')->paginate(10);
        return view('admin.users.indexdos')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        //Este medoto de encriptacion "encrypt" puede ser desencriptado
        //$user->password = encrypt($request->password);
        //El metodo "bcrypt", no puede ser desencriptado
        $user->password = bcrypt($request->password);
        $user->save();
        flash('Se ha Registrado '.$user->name.' de forma exitosa')->success();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        //$password = decrypt($user->password);
        return view ('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        //$user->password = bcrypt($request->password);
        $user->save();
        flash('Registro actualizado de forma exitosa')->success();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash('Se ha Eliminado '.$user->name.' de forma exitosa')->error();
        return redirect()->route('users.index');
    }
}
