<?php

	class Game extends Eloquent{

	
		protected $table = 'games';
		protected $guarded = array();

		public function reviews(){
			
			return $this->hasMany('Review');
		}

	}
	


?>