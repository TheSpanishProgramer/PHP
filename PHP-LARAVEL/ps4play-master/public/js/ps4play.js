jQuery(document).ready(function($) {
	
	//get data for the creation of the tooltip iframe
	//to be displayed when a user hovers over game image
	var width  = $('.vid-frame').width();
	var height = $('.vid-frame').height();
	var vid_id = $('.vid-id').val();
	var offset = -(10 + height).toString();
	var iframe = "<iframe width=" + width + " height=" + height +
				 " src='http://www.youtube.com/embed/"+
				  vid_id+"?rel=0&autoplay=1' frameborder='0' allowfullscreen></iframe>";

	//initialize tooltipster 
    $('.vid-frame').tooltipster({
 		content: $(iframe),
 		theme: 'light',
 		offsetY: offset+"px"
  	});

    //make ajax call to php script 
    //to remove item from cart
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
					$('#total').text('Total: $' + parseFloat( result ).toFixed(2));
					//if cart is empty, reload page. 
					if(result == 0)
					{
						location.reload();
					}				
			}
		});
	});

  
	
	console.log( width );

  	//make ajax call to update cart
  	//and display success message when done
	$('.purchase').click(function(){
		var id = $('#gameID').val();
		var script_url = $('#url').val();
		var number = $('#quantity').val();
		var text = "Item successfully added to cart";
   		number = parseInt(number);
   		console.log(number);

   		//if quantity was not selected, 
   		//assume user only wanted 1 item 
   		//when 'add to cart' selected 
   		if(number !== number) //implies number is NaN
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

	//display all rating 
	$('[class=star], [class=game-review]').each(function(){

		$(this).raty({
			starType: 'i', 
			score: Number($(this).attr('id')),
 			half: 'true',
 			showHalf: 'true',
 			readOnly: 'true',
 			hints: ['hated it', 'disliked it', 'liked it', 'really liked it', 'loved it']
		});
	});

	//user rating interface and retrieval 
	$('[class=customer-review]').raty({
			starType: 'i', 
 	    	half: 'true',
 	 		showHalf: 'true',
 			hints: ['hated it', 'disliked it', 'liked it', 'really liked it', 'loved it']
 	}).click(function(){
		var p = $(this).raty('score');
		p = parseFloat(p);
		$('#rating').val(p);
	});

	$('.null-rating-error').text("rating required");


	//scroll to reviews
	$('.review-count').click(function(){
    	$('html, body').animate({scrollTop: $( $(this).attr('href') ).offset().top }, 1000);
    	return false;
	});


	//validate user input:
	var resource = $("#uri").val();

	//validate user login
	$('#loginForm').bootstrapValidator({

		feedbackIcons: {

			valid: 'fa fa-check',
			invalid: 'fa fa-times',
			validating: 'fa fa-refresh'
		},

		fields: {

			username: {

				message: 'invalid username',
				validators: {

					notEmpty: {
						message: 'Username is a required field'
					},

					stringLength: {
						min: 6, 
						max: 30,
						message: 'The username must be between 6 and 30 characters long'
					},

					regexp: {
						regexp: /^[a-zA-Z0-9]+$/,
						message: 'The username can only contain letters and numbers'
					}
				}
			},

			password: {

				validators: {

					notEmpty: {
						message: 'password is a required field'
					},

					stringLength: {
						min: 8,
						message: 'The password must be at least 8 characters'
					}
				}				
			}
		}
	});

	//validate user registration
	$('#registrationForm').bootstrapValidator({

		feedbackIcons: {

			valid: 'fa fa-check',
			invalid: 'fa fa-times',
			validating: 'fa fa-refresh'
		},

		fields: {

			username: {

				message: 'invalid username',

				validators: {

					notEmpty: {
						message: 'Username is a required field'
					},

					stringLength: {
						min: 6, 
						max: 30,
						message: 'The username must be between 6 and 30 characters long'
					},

					regexp: {
						regexp: /^[a-zA-Z0-9]+$/,
						message: 'The username can only contain letters and numbers'
					},

					remote: {
						message: 'The username is unavailable',
						url: resource
					}
				}
			},

			email: {

				validators: {

					notEmpty: {
						message: 'Email is a required field'
					},

					emailAddress: {
						message: 'The email address is not valid'
					}
				}
			},

			password: {

				validators: {

					notEmpty: {
						message: 'password is a required field'
					},

					stringLength: {
						min: 8,
						message: 'The password must be at least 8 characters'
					},

					identical: {
						field: 'repass',
						message: 'The passwords do not match'
					}
				}				
			},

			repass: {

				validators: {

					notEmpty: {
						message: 'This is a required field'
					},

					identical: {
						field: 'password',
						message: 'The passwords do not match'
					}
				}
			}
		}
	});

	//validate review form data
	$('#customerReview').bootstrapValidator({

		feedbackIcons: {
			valid: 'fa fa-check',
			invalid: 'fa fa-times',
			validating: 'fa fa-refresh'
		},

		fields: {


			title: {

				message: 'This is a required field',

				validators: {

					notEmpty: {

						message: 'Title is a required field'
					},

					stringLength: {

						min: 2, 
						max: 100,
						message: 'The title must be between 2 and 100 characters long'
					}
				}
			},

			review: {

				validators: {

					notEmpty: {

						message: 'This is a required field'
					},

					stringLength: {

						min: 5,
						message: 'The review must be at least 8 characters'
					}
				}				
			}
		}
	});

	//contact validator

	$('#contact').bootstrapValidator({

		feedbackIcons: {

			valid: 'fa fa-check',
			invalid: 'fa fa-times',
			validating: 'fa fa-refresh'
		},

		fields: {


			name: {

				message: 'This is a required field',

				validators: {

					notEmpty: {

						message: 'Please enter your name'
					}
				}

			},

			email: {

				validators: {

					notEmpty: {

						message: 'An email address is a required'
					},

					emailAddress: {

						message: 'The email address is not valid'
					}
				}
			},

			subject: {

				message: 'This is a required field',

				validators: {

					notEmpty: {

						message: 'A subject is required'
					}
				}
			},

			message: {

				message: 'This is a required field',

				validators: {

					notEmpty: {

						message: 'A message is required'
					}
				}
			},
		}
	});
});