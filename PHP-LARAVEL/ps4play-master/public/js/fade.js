jQuery(document).ready(function($) {

	$('button.btn-primary').click(function(){
		var id = $('#gameID').val();
		var script_url = $('#url').val();
		var number = $('#quantity').val();
		var text = "Item successfully added to cart";
   		number = parseInt(number);
   		console.log(number);

   		if(isNaN(number))
   		{
   			number = 1;
   		}
		
		$.ajax({
					
				url: script_url, 
				data: {'gameID': id, 'quantity': number},
				type: 'post',
				success: function(result)
				{
					$('.alert').fadeIn('slow')
							   .addClass("alert alert-success")
							   .fadeOut(3000)
							   .children().text(text);
				}
		});

	});
	
});