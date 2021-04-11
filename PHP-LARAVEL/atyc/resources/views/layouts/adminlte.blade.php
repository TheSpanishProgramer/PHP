<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SIGECA</title>
  
  <link rel="icon" type="image/x-icon" href="<?php echo env('IMG_HOST').'/favicon.ico'; ?>">

  <link href="{{asset("/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css")}}" rel="stylesheet">


  <!-- Styles -->
  <link href={{url("/css/app.css")}} rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">  

  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">

  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/dist/css/skins/_all-skins.min.css")}}">

  <!-- tether para popover -->
  <link rel="stylesheet" href="{{ asset ("/bower_components/tether/dist/css/tether.min.css") }}" >

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset ("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" >  

  <!-- time picker -->
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.css")}}">

  <!-- date picker -->
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/plugins/datepicker/datepicker3.css")}}">

  <!-- date range picker -->
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css")}}">

  <!-- typeahead -->
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/jquery-typeahead/dist/jquery.typeahead.min.css")}}">

  <!-- fontawesome -->
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/font-awesome/css/font-awesome.min.css")}}">

  <!-- datatable buttons -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">

  <!-- select 2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- datatable reorder -->
  <link href="https://cdn.datatables.net/rowreorder/1.2.0/css/rowReorder.dataTables.min.css" rel="stylesheet" />
  
  <!-- datatable responsive -->
  <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" />

  
  <!-- Jquery UI ejemplo -->
  <link rel="stylesheet" href="{{asset("/bower_components/jquery-ui/themes/base/jquery-ui.min.css")}}">

  <link rel="stylesheet" type="text/css" href="{{url("/css/atyc.css")}}">

  <!-- Scripts -->
  <script>
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
      ]); ?>
    </script>

    <!-- jQuery 2.1.4 -->
    <script type="text/javascript" src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script> 

    <!-- tether para popover -->
    <script type="text/javascript" src="{{ asset ("/bower_components/tether/dist/js/tether.min.js") }}" ></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script type="text/javascript" src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" ></script>

    <!-- DataTable -->    
    <!-- <script type="text/javascript" src="{{ asset ("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js") }}" ></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" ></script>

    <script type="text/javascript" src="{{ asset ("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js") }}" ></script>
    
    <!-- Block UI -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>

    <!-- js adminlte -->
    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/dist/js/app.min.js")}}"></script>

    <!-- FastClick -->
    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/fastclick/fastclick.min.js")}}"></script>

    <!-- SlimScroll -->
    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>    

    <!-- js validate-->
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js" ></script>

    <!-- full calendar -->
    <script type="text/javascript" src="{{asset("/bower_components/jquery-ui/jquery-ui.min.js")}}"></script>

    <!-- time picker -->
    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js")}}"></script>

    <!-- date picker -->
    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js")}}"></script>

    <!-- date range picker -->
    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js")}}"></script>

    <!-- typeahead -->
    <script type="text/javascript" src="{{asset("/bower_components/jquery-typeahead/dist/jquery.typeahead.min.js")}}"></script>

    <!-- form-validation -->
    <script type="text/javascript" src="{{asset("/bower_components/html5-form-validation/dist/jquery.validation.min.js")}}"></script>

    <script type="text/javascript" src="{{ asset ("/dist/js/jquery.validate.min.js") }}"></script>

    <!-- select 2 -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- datatable buttons -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

    <!-- knob -->
    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/knob/jquery.knob.js")}}"></script>

    <!-- Scripts propios -->
    <script type="text/javascript" src="{{asset("/js/atyc.js")}}"></script> 

    <!-- Inputmask -->
    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js")}}"></script>

    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js")}}"></script>

    <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js")}}"></script>

    <!-- datatable reorder -->
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.0/js/dataTables.rowReorder.min.js"></script>

    <!-- datatable responsive -->
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>

    <script type="text/javascript" src="{{asset("/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js")}}"></script>

    @stack('scripts')
    
  </head>
  <body class="skin-blue" style="height: auto; min-height: 100%;">
    <div class="wrapper" style="height: auto; min-height: 100%;background-color: #f5f5f5;">
      <header class="main-header">
        <!-- Branding Image -->
        <a class="logo" href="{{ url('/dashboard') }}">
          <span class="logo-mini"><b>SIGECA</b></span>
          <span class="logo" style="font-size: 0.6em; margin-left: -2rem; padding-top: 0rem; line-height: 1.8rem;"><b>SIGECA</b> <br> <b>SI</b>STEMA DE <b>GE</b>STIÓN DE <b>CA</b>PACITACIÓN</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          @include('layouts.navbar')
        </nav> 
      </header>
      @if (!Auth::guest())
      <aside class="main-sidebar">
        @include('layouts.sidebar')
      </aside>
      <div class="content-wrapper">      
	<section class="content" style="padding: 5px 5px 0px 5px;">          
          @include('layouts.testing')
          @include('layouts.header')
          @yield('content')
        </section>
      </div>
      @else
      <div class="content-wrapper" style="margin-left:0em;">      
	<section class="content">
	      @include('layouts.testing')
          @yield('content')
        </section>
      </div>
      @endif   
    </div>  
  </body>
  </html>

  <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js")}}"></script>

  <script type="text/javascript" src="{{asset("/bower_components/admin-lte/plugins/datepicker/locales/bootstrap-datepicker.es.js")}}" charset="UTF-8"></script>

  <script type="text/javascript" src="{{ asset ("/dist/js/jquery.validate.min.js") }}"></script>

  <script type="text/javascript">

    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

    $.blockUI.defaults = { 
      css: {
        border: 'none',
        padding: '15px',
        backgroundColor: '#000',
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: .5,
        color: '#fff',
      },    
      message: '<i class="fa fa-spinner fa-spin"></i>  Cargando...', 
    };

    /*Traduccion a español para DataPicker*/
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      language: 'es',
      autoclose: true,
    });

    $('.select2').select2();
    $(".js-example-basic-multiple").select2();

    $(document).ready(function(){     

      /*
      history.replaceState(null, null, location.href);
      console.log(window.history);
      */

      /*Traduccion a español para DataTable*/
      $.extend( $.fn.dataTable.defaults, {
        processing: true,
        scrollY:"400px",
        scrollCollapse: true,
        serverSide: true,
        rowReorder: false,
        responsive: true,
        language: {
          emptyTable: "No se encontraron registros",
          info: "Mostrando registros del _START_ al _END_ de _TOTAL_ registros",
          infoEmpty: "No hay registros disponibles",
          infoFiltered: "(filtrados de un total de _MAX_ registros)",
          lengthMenu: "Mostrar _MENU_ registros",
          loadingRecords: "Cargando...",
          paginate: {
            next: "Siguiente",
            previous: "Anterior",
            last: "Ultima"
          },
          processing: "Procesando...",
          search: "Buscar:",
          thousands: ".",
          zeroRecords: "No se encontraron registros",
        }
      });

      /*
      $(".main-sidebar").on("click", "#destinatarios", function (e) {
        e.preventDefault();
        let url = $(this).attr("href");

        $.ajax({
          url: url,
          success: function (html) {
            $(".content").html(html);
            history.pushState(url, null, url);
            console.log(window.history);
          },
          error: function (html) {
            alert("El modulo no funciona.");
          },
        })
        .done(function() {

        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

      })
      */

    });

    /*
    window.onpopstate = function (e) {
      console.log(e);
      location.href = e.state.url;
    }
    */

    var timer;
    window.onload = resetTimer;
  // DOM Events
  document.onmousemove = resetTimer;
  document.onkeypress = resetTimer;

  function resetTimer() {
    clearTimeout(timer);
    timer = setTimeout(function() {
      $.post('{{url('/logout')}}', {_token: $('meta:nth-child(4)').attr('content')}, function(data, textStatus, xhr) {
        console.log('logout');
        location.reload();
      });  
    },1140000); //19 minutos es 1 menos que en el servidor. 
  }

</script>
@yield('script')
@stack('moreScripts')


