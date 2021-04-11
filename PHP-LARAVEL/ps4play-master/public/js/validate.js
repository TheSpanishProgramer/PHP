jQuery(document).ready(function($) {

	var resource = $("#uri").val();

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
	
});