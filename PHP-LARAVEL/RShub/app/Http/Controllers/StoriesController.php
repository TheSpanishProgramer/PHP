<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Story;

use App\User;
use Auth;

class StoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Game $game)
    {
        return view('stories.create', compact('game'));
    }

    public function store(Game $game){

        Story::create([
            'game_id' => request('game_id'),
            'user_id' => auth()->id(),
            'completed' => request('completed'),
            'story' => request('story'),
            'image_url' => request('image_url'),
            'video_url' => request('video_url')
        ]);

        return redirect('/games');

    }

    public function edit($id){

        $story = Story::findOrFail($id);
        $user = Auth::user();

        if ($user->id == $story->user_id || Auth::user()->hasRole('Admin')) {
            return view('stories.edit', compact('review', 'story'));
        }
        else {
            return redirect('/games');
        }
    }

    public function update($id, Request $request){

        $story = Story::findOrFail($id);
        $story->update($request->all());

        return redirect('games');
    }

    public function delete($id){
        $story = Story::findOrFail($id);
        $story->delete();

        return redirect('/');
    }

}
