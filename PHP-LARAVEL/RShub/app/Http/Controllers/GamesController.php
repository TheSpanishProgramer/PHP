<?php

namespace App\Http\Controllers;

use App\Game;
use Auth;

class GamesController extends Controller
{
    public function index() {
        $games = Game::all();
        return view('games.index', compact('games', 'reviews'));
    }

    public function show(Game $game) {
        return view('games.show', compact('game', 'reviews'));
    }

    public function add(){

        if (Auth::user()->hasRole('Editor') or Auth::user()->hasRole('Admin')){
            return view('games.add');
        }
        else {
            return redirect('/games');
        }

    }

    public function store(Game $game){

        Game::create([
            'name' => request('name'),
            'release_date' => request('release_date'),
            'summary' => request('summary'),
            'developer' => request('developer'),
            'image_url' => request('image_url'),
            'trailer_url' => request('trailer_url')
        ]);

        return redirect('/games');

    }
}
