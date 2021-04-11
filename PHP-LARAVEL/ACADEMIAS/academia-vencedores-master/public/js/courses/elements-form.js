var $formRegister
    //show modal
      $(function(){
    		
			$('[data-add]').on('click',addModal);
			$('[data-edit]').on('click',editModal);	
			$('[data-delete]').on('click',confirmation);	        	
        });

        function addModal(){    

		    $('#modal_course').modal();

            // $formRegister = $('#formRegisterCourse');
            // $('#btn_register').on('click', function () {
                
            //     url = $formRegister.attr('action');
            //     $.ajax({
            //         url: url,
            //         method: 'POST',
            //         data: $formRegister.serialize()
            //     })
            //         .done(function (data) {
            //             if(data.error)
            //                 Materialize.toast(data.message, 4000);
            //             else{
            //                 Materialize.toast(data.message, 4000);
            //                 setTimeout(function(){
            //                     location.reload();
            //                 }, 2000);
            //             }
            //         })
            //         .fail(function () {
            //             alert('Ocurrió un error inesperado');
            //              // Materialize.toast("error XD", 4000);
            //         });
            // });
		}

		function editModal(){   
			//id
			var course_id = $(this).data('edit');
			$('#id').val(course_id);
			//description
			var description = $(this).parent().prev().text();
			$('#description').val(description); 
			//name
			var name = $(this).parent().prev().prev().text();
			$('#name').val(name); 

			// alert($("#edit_course").attr("action"));
			// $("#register").attr("action", "http://www.test.com");
			
			$('#modal_edit').modal();
		}
		//modal confirmar eliminacion
		function confirmation(){
        	//id
			var course_id = $(this).attr('data-delete');
			
			$('#delete').attr("href", "/curso/"+course_id+"/eliminar");
        	
        	$('#modal_delete').modal(); 
        }
          
    $("#formRegisterCourse").validate({
        rules: {
            vname: {
                required: true,
                minlength: 5
            },
        },
        //For custom messages
        messages: {
            uname:{
                required: "Es necesario que ingrese un nombre",
                minlength: "Debe ingresar al menos 5 caracteres"
            },
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
