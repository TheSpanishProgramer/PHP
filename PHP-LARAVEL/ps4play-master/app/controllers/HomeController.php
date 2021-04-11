<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	private function makeImageLinks($games){

		$format = '<a href="%s" class="top-game-link">
					<img src="%s" alt="game" class="image-game top-game">
					<div class="caption text-center">
					 	<span class="top-game-link"> %s </span>
					 	<div class="star" id="%s"></div>
					</div>
				   </a>';

		$imageLinks = array();
		foreach ($games as $game){

			$g = $game->genre;
			$n = $game->slug;
			$href = action( "GameController@showGames", array($g, $n) );
			$src = 'images/'.$game->image_name.'.jpg';
			$caption = $game->name;
			$id = $game->reviews()->avg('stars');
			$imageLinks[] = sprintf($format, $href, $src, $caption, $id);
		}
		return $imageLinks;
	}

	public function showHome(){

		$reviews = Review::orderBy('stars', 'DESC')->paginate(3);
		$games = array();

		foreach ($reviews as $review){
			
			array_push( $games, Game::find( $review->game_id ) );
		}

		$imageLinks = $this->makeImageLinks($games);

		return View::make('pages.home')->with('imageLinks', $imageLinks);
	}
}
