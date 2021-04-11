<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Movie;
use Notification;

class CatalogController extends Controller
{
	public function getHome() {		
		$movies = DB::table('movies')->get();

		return view('catalog.index',
			array('movies' => $movies));
    }

	public function getIndex() {		
		$movies = DB::table('movies')->get();

		return view('catalog.index',
			array('movies' => $movies));
    }

    public function getCreate() {
        return view('catalog.create');
	}
	
	public function postCreate(Request $request) {
		$movie = new Movie();
		$movie->title = $request->input('title');
		$movie->year = $request->input('year');
		$movie->director = $request->input('director');
		$movie->poster = $request->input('poster');
		$movie->synopsis = $request->input('synopsis');

		$movie->save();
		Notification::success('La película se ha guardado correctamente');		

		return redirect()->route('home');
	}

    public function getShow($id) {
		$movie = Movie::findOrFail($id);

		return view('catalog.show',
			array('pelicula' => $movie));
    }

    public function getEdit($id) {
		$movie = Movie::findOrFail($id);

		return view('catalog.edit',
			array(
				'id' => $id,
				'pelicula' => $movie));
	}	
	
	public function putEdit(Request $request, $id) {
		$movie = Movie::findOrFail($id);

		$movie->title = $request->input('title');
		$movie->year = $request->input('year');
		$movie->director = $request->input('director');
		$movie->poster = $request->input('poster');
		$movie->synopsis = $request->input('synopsis');

		return redirect()->route('home');

	}
}


