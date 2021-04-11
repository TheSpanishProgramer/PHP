  $(document).ready(function(){
    /*--Funcion para obtener en el select los servicios asociados auna sede--*/
     var sede = $(this).val();
    $("#sedes").change(function(){
      sede = $(this).val();
      $.get('byservicio/'+event.target.value+"", function(data){
    //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
        console.log(data);
        $("#servicios").empty();
        $("#servicios").append("<option value=''>Seleccione un Servicio</option>");
            for (var i=0; i<data.length;i++)
             $("#servicios").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
      });
    });
    /*-- Funcion para obtener los profesionales asociado al servicio seleccionado--*/
    $("#servicios").change(function(){
      var servicio = $(this).val();
      console.log(sede);
      $.get('byprofesional/'+servicio+'/'+sede+'', function(data){
    //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
        console.log(data);
        $("#profesional").empty();
        if (data.length!=0) {
          $("#profesional").append("<option value=''>Seleccione un Profesional</option>");
          for (var i=0; i<data.length;i++){
            $("#profesional").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
          }
        }else{
          $("#profesional").append("<option> No existen profesionales asignados</option>");
        }
        
      });
    });
    /*-- Funcion para obtener los clientes--*/
    /* Manera 2*/
    $("#cliente").keyup(function(){
      var query = $(this).val();
      if (query!='') {
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url:"../../admin/citas/clientes",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
            console.log(data);
            $('#list-cliente').fadeIn();
            $('#list-cliente').html(data);
          }
        });
      }
    });

    /*---Plugin de Chosen JQuery----*/
     $(".chosen-select").chosen({width: "auto"}); 
     $(".chosen-select").chosen({no_results_text: "No existen resultados de la busqueda"}); 
     /*---Traer Datos del Formulario----*/
    //cuando hagamos submit al formulario con id id_del_formulario
    //se procesara este script javascript
    $("#btn-registrar").click(function(){
        $.ajax({
          url: $(this).attr("action"),//action del formulario, ej:
          //http://localhost/mi_proyecto/mi_controlador/mi_funcion
          type: $(this).attr("method"),//el método post o get del formulario
          data: $("#form-citas").serialize(),//obtenemos todos los datos del formulario
          error: function(){
          //si hay un error mostramos un mensaje
          },
          success:function(data){
          //hacemos algo cuando finalice todo correctamente
          }
        });
        var data = $("#form-citas").serialize();
        console.log(data);
    });
    /*---Verificar disponibilidad de los horarios, enviará alert de disponible u ocupado----*/
    $("#reservatime").on('click', function(){
        var time = $('#reservatime').val();
        var date = $('#reservadate').val();
        var profesional = $('#profesional').val();
            $.ajax({
            url: '../../admin/citas/disponibilidad/'+profesional+'/'+date+'/'+time,
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            error: function(){
               console.log("Horario Disponible");
            },
            success:function(data){
              console.log("Horario Disponible");
            }
          });
      });
    //Procedimiento para agregar un cliente mediante el uso de AJAX JQuery
      $( "#add_cliente" ).submit(function( event ) {
      var parametros = $(this).serialize();
      var token = $('#token').val();
      $.ajax({
          url: "../../admin/clientes/storeajax",
          headers: {'X-CSRF-TOKEN': token},
          type: "POST",
          data: parametros,
          beforeSend: function(objeto){
            $("#resultados").html("Enviando...");
            },
          success: function(datos){
          $('#crearCliente').modal('hide');
          },
          error:function(datos){
            console.log(datos);
          }
      });
      event.preventDefault();
    });
});