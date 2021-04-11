<?php

	class Review extends Eloquent{

		protected $table = 'reviews';
		protected $guarded = array();
		
		public function game(){

			return $this->belongsTo('Game');
		}
	}
	


?>