<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Incident;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getReport(){

        $categories = Category::where('project_id', 1)->get(); // Se pasan las categorías del Proyecto 1
        return view('report')->with(compact('categories'));
    }

    public function postReport(Request $request) {

        $rules = [
            'category_id' => 'sometimes | nullable | exists:categories,id', // Permite que el campo se pase a veces, nullable permite pasar el valor null cuando la categoría sea General | Verificamos que el id de la categoría exista en la base de datos.
            'severity' => 'required | in:M,N,A ',
            'title' => 'required | min:5',
            'description' => 'required | min:15'
        ];

        $messages = [
            'category_id.exists' => 'La categoría seleccionada no existe en nuestra base de datos.',
            'title.required' => 'Es necesario ingresar un título para la incidencia.',
            'title.min' => 'El título debe presentar almenos 5 carácteres.',
            'description.required' => 'Es necesario ingresar una descripción para la incidencia.',
            'description.min' => 'La descripción debe presentar almenos 15 carácteres.'
        ];

        $this->validate($request, $rules, $messages);

        $incident = new Incident();
        $incident->category_id = $request->input('category_id') ?: null; // Tomae el valor de category_id si no es null
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
        $incident->client_id = auth()->user()->id;
        $incident->save();

        return back();
    }
}
