<?php

	class GameController extends BaseController{

		public function showGames($genre, $slug = null){

			if(isset($slug)){

				$game = Game::where('slug', '=', $slug)->firstOrFail();
				return View::make('pages.game', array('game' => $game));
			}

			else{

				$games = Game::where('genre', '=', $genre)->get();
				if($genre == "rpg"){
				 
					$genre = "Role Playing";
				}

				return View::make('pages.games', array('games' => $games, 'genre' => $genre));
			}		
		}
	}

?>