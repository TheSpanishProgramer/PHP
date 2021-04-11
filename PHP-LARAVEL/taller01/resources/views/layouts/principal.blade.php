<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Taller Laravel</title>
    <!-- Compiled and minified CSS -->
     {!! MaterializeCSS::include_full() !!}
    
    <!--Import Google Icon Font-->
    {!!Html::style('https://fonts.googleapis.com/icon?family=Material+Icons')!!}
    
    
    

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
</head>
<body>
    <div class="navbar-fixed">
        <nav class="teal">
          <div class="nav-wrapper z-depth-0">
            <a href="{!!URL::to('/')!!}" class="brand-logo hide-on-med-and-down">&nbsp;&nbsp;Taller Laravel</a>
            <a href="{!!URL::to('/')!!}" class="brand-logo hide-on-large-only">Taller Laravel</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons icon">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="/producto/create"><i class="material-icons icon left">add_box</i>Agregar Producto</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li>
                <a href="/producto/create">Agregar Producto</a>
              </li>
            </ul>
          </div>
        </nav>
    </div>

    @yield('content')
    
    <footer class="page-footer teal">
        <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="logo brand-logo">Taller Laravel</h5>
                <p class="brown-text text-darken-2">¡Aprendamos los conceptos basicos de laravel!</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="brown-text text-darken-2 elegant">Enlaces</h5>
                <ul>
                  <li><a class="brown-text text-darken-2" href="https://github.com/Jhonbeltran">Contacto</a></li>
                </ul>
              </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container brown-text text-darken-3">
            © 2016
            </div>
        </div>
    </footer>


    <!--Import jQuery before materialize.js-->
    {!!Html::script('https://code.jquery.com/jquery-2.1.1.min.js')!!}
    <!-- Compiled and minified JavaScript -->
    {!! MaterializeCSS::include_js() !!}
</body>
</html>