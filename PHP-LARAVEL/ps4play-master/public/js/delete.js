jQuery(document).ready(function($) {
	$('.remove-item').click(function(){
		var id = $(this).attr('id');
		var url = $('[name=url]').val();

		$.ajax({
					
			url: url, 
			data: {'gameID': id},
			type: 'post',
			success: function(result)
			{
					$('#' + id).remove();
					$('#total').text('Total: $' + result);
					if(result == 0)
					{
						$('button').prop("disabled", true);
					}
					
			}
		});
		

	});
});