<!DOCTYPE html>
<html lang="pt-BR" ng-app="agenda-app">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="David Alves de Souza">

	<title>Agenda de Visistação</title>

    <!-- <link rel="stylesheet" href="resources/assets/css/yeti-bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower/components-font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bower/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/bower/sweetalert2/dist/sweetalert2.css')}}">
</head>
<body>

	@include('layouts.header')

    <!-- .Conteúdo -->
    <div class="container-fluid col-md-8 col-md-offset-2">

        @yield('content')

    </div>
    <!-- /.Conteúdo -->

    <script src="{{asset('assets/bower/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('assets/bower/angular/angular.min.js')}}"></script>
    <script src="{{asset('assets/bower/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('assets/bower/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>
