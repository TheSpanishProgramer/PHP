<?php

	use Illuminate\Auth\UserTrait;
	use Illuminate\Auth\UserInterface;
	use Illuminate\Auth\Reminders\RemindableTrait;
	use Illuminate\Auth\Reminders\RemindableInterface;

	class Customer extends Eloquent implements UserInterface, RemindableInterface{
		
		use UserTrait, RemindableTrait;
		
		protected $table = 'customers';
		protected $fillable = array('fname', 'lname');	
		public static $rules = array(
										'firstname'=>'required|alpha|min:2',
										'lastname'=>'required|alpha|min:2',
										'username'=>'required|alpha_num|min:6|unique:customers',
										'email'=>'required|email|unique:customers',
										'password'=>'required|alpha_num|min:8'

			    					);
	}

?>
