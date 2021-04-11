<?php

	class CartController extends BaseController{

		private function processCart(){

				$items = Session::get('cart');
				$games = array();
				$total = array();
	
				foreach ($items as $id => $quantity){

					$game = Game::find($id);
					array_push($games, array('game'=>$game, 'num'=>$quantity));
					array_push($total, $quantity * $game->price);
				}
				return array('games' => $games, 'total' => $total);
		}
		
		public function cart(){

			if(Session::has('cart')){
				
				$cart  = $this->processCart();
				$games = $cart['games'];
				$total = $cart['total'];

				return View::make('pages.cart')->with('games', $games)
											   ->with('total', array_sum($total));
			}
			else{
				
				return View::make('pages.cart');
			}
		}

		public function remove(){

			$id = (int)Input::get('gameID');
			$cart = Session::get('cart');
			unset($cart[$id]);

			if(!count($cart)){

				Session::forget('cart');
				echo 0;		
			}
			else{

				Session::put('cart', $cart);
				$total = array();

				foreach ($cart as $id => $quantity){

					$game = Game::find($id);
					array_push($total, $quantity * $game->price);
				}
				echo array_sum($total);
			}			
		}

		public function updateCart(){

			$id = (int)Input::get('gameID');
			$num = (int)Input::get('quantity');

			if(Session::has('cart')){

				$cart = Session::get('cart');

				//if session has cart, and game id alrerady exists,
				//add the new quantity to the old.  
				if(array_key_exists($id, $cart)){

					$cart[$id] = $cart[$id] + $num;
					Session::put('cart', $cart);
				}
				else{

					$cart[$id] = $num;
					Session::put('cart', $cart);
				}					
			}
			else{

				$cart = array($id => $num);
				Session::put('cart', $cart);
			}
		}

		public function checkOut(){

			$data  = $this->processCart();
			
			Mail::send('emails.order', $data, function($message){

				$email = Auth::user()->email;
				$name = Auth::user()->fname . " " . Auth::user()->lname;
				$message->to($email, $name)->subject('Order Confirmation');

			});
			Session::forget('cart'); 

			return View::make('pages.confirmation', array('confirmationNumber'=>1));
		}
	}
?>