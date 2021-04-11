<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\http\Requests\CreateUserRequest;
use App\http\Requests\UpdateUserRequest;
class UserController extends Controller
{

    public function __construct(){
        $this->middleware('user');
    }
    
    public function index(Request $request)
    {

            $users = User::name($request->get('name'))->orderBy('id','desc')->paginate(10);
        
            return view('usuarios.index')->withUsers($users);
        
	}

	public function create()
    {

        return view('usuarios.create');
    }

    public function store(CreateUserRequest $request)
    {

    	$user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->rol_id = '2';

        $user->save();

        if($user->save()){

            return redirect()->route('usuarios.index')->with('status', "Usuario $user->name creado");
        } else {
            return redirect()->back()->with('status', 'No se ha podido crear al Usuario');
        }
    }


    public function edit($id)
    {

        $user = User::findOrFail($id);
        return view('usuarios.edit')->withuser($user);
    }

    public function update(UpdateUserRequest $request, $id)
    {    	
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->rol_id = $request->input('rol_id');
        $user->save();

        if($user->save()){
            
            return redirect()->route('usuarios.index')->with('status', "Usuario $user->name actualizado");
        } else {
            return redirect()->back()->with('status', 'No se ha podido actualizar los datos del Usuario');
        }

    }

         public function destroy($id)
    {
    	$user = User::findOrFail($id);
        User::destroy($id);

        return redirect()->route('usuarios.index')->with('status', "Usuario $user->name Borrado");
    }
}
