<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
use App\Review;
use App\User;
use Auth;

class ReviewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        return view('reviews.index');
    }

    public function show(Game $game, User $user)
    {
        return view('reviews.show', compact('game', 'user'));
    }

    public function create(Game $game)
    {
        return view('reviews.create', compact('game'));
    }

    public function store(Game $game, User $user)
    {

        Review::create([

            'game_id' => request('game_id'),
            'user_id' => auth()->id(),
            'review' => request('review'),
            'rating' => request('rating')

        ]);

        return redirect('/games');
    }

    public function edit($id){

        $review = Review::findOrFail($id);
        $user = Auth::user();

        if ($user->id == $review->user_id || Auth::user()->hasRole('Admin')) {
            return view('reviews.edit', compact('review', 'user'));
        }
        else {
            return redirect('/games');
        }
    }

    public function update($id, Request $request){

        $review = Review::findOrFail($id);
        $review->update($request->all());

        return redirect('games');
    }

    public function delete($id){
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect('/');
    }
}
