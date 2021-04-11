<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CUS-SUMAR-Elearning</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset ("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" ></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/plugins/iCheck/square/blue.css")}}">

  <!-- ADMIN-LTE -->
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("/bower_components/admin-lte/dist/css/skins/_all-skins.min.css")}}">
  <link rel="stylesheet" type="text/css" href="{{url("/css/atyc.css")}}">

  <meta name="csrf-token" content="{{ csrf_token() }}">

<script>
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
    ]); ?>
  </script>
</head>
<body class="hold-transition register-page">

</body>
</html>

<div class="register-box">
  <div class="register-logo">
    <p><b>SIGECA</b></p>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Solicitud de usuario.</p>

    <form action="{{ url('/register') }}" method="post" role="form">
      {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input id="name" name="name" type="text" class="form-control" placeholder="Nombre completo" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="email" name="email" type="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Repetir Contraseña" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <hr>
      <div class="form-group">
          <select class="form-control" id="provincia" name="id_provincia">
            <option data-id="0" value="" title="Todas las provincias">Provincia</option>
            @foreach (App\Provincia::where('id_provincia', '!=', 25)->get() as $provincia)
            <option data-id="{{$provincia->id_provincia}}" value="{{$provincia->id_provincia}}" title="{{$provincia->titulo}}">{{$provincia->nombre}}</option>                  
            @endforeach
          </select>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
          <button type="submit" class="btn btn-primary btn-block">Solicitar</button>
        </div>
      </div>
    </form>    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script type="text/javascript" src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" ></script>
<!-- iCheck -->
<script type="text/javascript" src="{{ asset ("/bower_components/admin-lte/plugins/iCheck/icheck.min.js") }}" ></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
