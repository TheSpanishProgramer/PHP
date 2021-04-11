<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','Home') | Panel de Administracion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datepicker/datepicker3.css') }}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/css/skins/skin-green.min.css')}}">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar/fullcalendar.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
  <!-- Chosen style -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/chosen/chosen.css') }}">
<!-- jQuery 2.2.3 -->
<script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!--  Moment.js  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <!-- fullCalendar 2.2.5 -->
  <script src="{{ asset('admin/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/fullcalendar/es-do.js') }}"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CEJAS</b> PERFECTAS</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- /.messages-menu -->

          <!-- ------------------ -->
          <!-- Notifications Menu -->
          <!-- ------------------ -->
          <!--Here Notifications Menu -->

          <!-- Tasks Menu -->
          <!-- Here TASK MENU-->
             
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="" title="Usuario Activo">Usuario Activo: {{ Auth::user()->name }}</span>
            </a>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="{{ route('logout') }}" data-toggle="control-sidebar" title="Cerrar Sesión" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa  fa-power-off"></i>
              @csrf
            </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      @yield('userpanel')

      <!-- search form (Optional) -->
      @yield('search-form')
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ url('/home') }}"><i class="fa fa-laptop"></i> <span> Inicio </span></a></li>
        @if(Auth::user()->admin())
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.index')}}">Administradores</a></li>
            <li><a href="{{ route('users.digitadores')}}">Digitadores</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-briefcase"></i> <span>Catálagos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('sedes.index')}}"><i class="fa fa-bank"></i><span>Sedes</span> </a></li>
            <li><a href="{{ route('servicios.index')}}"><i class="fa fa-user-md"></i> <span> Servicios </span></a></li>
          </ul>
        </li>
        <li><a href="{{ route('profesionals.index')}}"><i class="fa fa-user-md"></i> <span> Profesionales</span></a></li>
        @endif
        <li><a href="{{ route('clientes.index')}}"><i class="fa fa-child"></i> <span> Clientes</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-calendar"></i> <span>Gestion de Citas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--li><a href="#"> Turnos </a></li>
            <li><a href="#"> Asignar Turno a Profesional </a></li-->
            <li><a href="{{ route('citas.create') }}"> Asignar Citas </a></li>
            <li><a href="{{ route('citas.index') }}"> Listado de Citas </a></li>

          </ul>
        </li>
        @if(Auth::user()->admin())
        <li class="treeview">
          <a href="#"><i class="fa fa-print"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('reportes.index')}}"> Citas </a></li>
          </ul>
        </li>
        @endif
        <!--li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Configuracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"> Sedes </a></li>
            <li><a href="#"> Opcion 2</a></li>
          </ul>
        </li-->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @include('flash::message')
      @yield('content-header')
    </section>
    <!-- Main content -->
    <section class="content">
      @yield('modal-calendar')
<!-- Your Page Content Here -->
      @yield('main-content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Cejas Perfectas </a>.</strong> Todos los derechos Reservados.
  </footer>

  <!-- Control Sidebar -->
  @yield('sidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/app.min.js')}}"></script>
<!-- Script Personalizados Functions -->
<script src="{{ asset('admin/js/functions/citas.js') }}"></script>
<!--Chosen 1.4.2-->
<script src="{{ asset('admin/plugins/chosen/chosen.jquery.js') }}"></script>
@extends('admin.partials.full-calendar')
<!-- date-range-picker -->
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('admin/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<!-- bootstrap time picker -->
<script src="{{ asset('admin/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- Page script -->
<script>
  $(function () {

    //Timepicker
    $(".timepicker").timepicker({
        format: 'hh:mm',
       showInputs: false
    });
  });
  /* Visualizacion de datos en el modal de las citas*/
  $('#vistaCita').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var sede = button.data('sede') // Extraer la información de atributos de datos
      var servicio = button.data('servicio') // Extraer la información de atributos de datos
      var profesional = button.data('profesional') // Extraer la información de atributos de datos
      var fecha = button.data('fecha') // Extraer la información de atributos de datos  
      var cliente = button.data('cliente') // Extraer la información de atributos de datos
      var email = button.data('email') // Extraer la información de atributos de datos  
      var status = button.data('status') // Extraer la información de atributos de datos      
      var notas = button.data('notas') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('.modal-title').text('Ver Articulo: '+servicio)
      modal.find('.modal-body #servicio').val(servicio)
      modal.find('.modal-body #sede').val(sede)
      modal.find('.modal-body #fecha').val(fecha)
      modal.find('.modal-body #profesional').val(profesional)
      modal.find('.modal-body #cliente').val(cliente)
      modal.find('.modal-body #email').val(email)
      modal.find('.modal-body #status').val(status)
      modal.find('.modal-body #notas').val(notas)
      $('.alert').hide();//Oculto alert
  });
  /*CHosen para el modulos de citas*/
  $('.cli-select').chosen({ width:"100%"});
</script>

@yield('search-sede')
</body>
</html>
