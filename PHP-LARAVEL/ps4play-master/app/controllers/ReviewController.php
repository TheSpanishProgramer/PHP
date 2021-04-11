<?php

	class ReviewController extends BaseController{

		public function review($id){
			
			$game  = Game::find($id);
			return View::make('pages.review', array('game'=>$game));
		}

		public function reviewHandler($id){

			$validator = Validator::make(
				array('stars'=>Input::get('stars')), 
				array('stars'=>'required')
			);

			if( $validator->passes() ){

				Review::create(
					array(

						'game_id'=>$id,
						'username'=>Auth::user()->username,
						'title'=>Input::get('title'),
						'review'=>Input::get('review'),
						'stars'=>Input::get('stars')
					)
				);
				$game = Game::find($id);
				$genre = $game->genre;
				$slug = $game->slug;
				return Redirect::action('games', array('genre'=>$genre, 'slug'=>$slug));
			}
			else{

				return Redirect::back()->withErrors( $validator );
			}			
		}
	}



?>