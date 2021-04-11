jQuery(document).ready(function($) {

	$('[class=star]').each(function(){

		$(this).raty({starType: 'i', 
			 		  score: Number($(this).attr('id')),
 			 	  	  half: 'true',
 			 	  	  showHalf: 'true',
 			 	  	  readOnly: 'true'

					});
			});

	$('[class=review]').raty({starType: 'i', 
 			 	  			  half: 'true',
 			 	  			  showHalf: 'true',
 			 	 			  hints: ['hate it', 'dislike it', 'like it', 'really like', 'love it']

							}).click(function() {
								var p = $(this).raty('score');
								$('#rating').val(p); //remove
						});


});



