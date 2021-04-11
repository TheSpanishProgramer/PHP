<?php

	class CustomerController extends BaseController
	{
		
		public function signUp(){ return View::make('pages.signup'); }
		public function signIn(){ return View::make('pages.signin'); }

		private function getCredentials(){

			return array('username'=>Input::get('username'), 'password'=>Input::get('password'));
		}

		private function messages($messageType){

			$message = array('logout'         => 'Succesfully logged out',
							 'createSuccess'  => 'Account successfully created',
							 'createFail'     => 'The following errors occurred:',
							 'loginFail'      => 'Your username/password combination was incorrect');

			return $message[$messageType];
		}

		public function logOutHandler(){

			Auth::logout();
			return Redirect::to('/');
		}

		public function checkUsername(){

			$isAvailable;
			$username = Input::get('username');
			try {

    			$user = Customer::where('username', '=', $username)->firstOrFail();
    			$isAvailable = false;
			}
			catch (Illuminate\Database\Eloquent\ModelNotFoundException $e){

    			$isAvailable = true;
			}
			echo json_encode(array('valid' => $isAvailable));
		}

		public function signUpHandler(){

			$validator = Validator::make(Input::all(), Customer::$rules);
			if($validator->passes()){

				$customer = new Customer;
				$customer->fname = Input::get('firstname');
				$customer->lname = Input::get('lastname');
				$customer->username = Input::get('username');
				$customer->email = Input::get('email');
				$customer->password = Hash::make(Input::get('password'));
				$customer->save();

				return Redirect::to('/login')->with('success', $this->messages('createSuccess'));
			}
			else{

				return Redirect::to('/register')->with('message', $this->messages('createFail'))
											   ->withErrors($validator)
											   ->withInput();
			}
		}

		public function loginHandler(){
	
			$credentials = $this->getCredentials();
			if(Auth::attempt($credentials)){

				return Redirect::to('/');
			}
			else{

				return Redirect::to('/login')
				->with('failure', $this->messages('loginFail'))
				->withInput();
			}
		}
	}	

?>