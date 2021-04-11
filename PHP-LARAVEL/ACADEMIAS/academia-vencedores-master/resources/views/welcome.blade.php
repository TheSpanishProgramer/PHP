<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Los Vencedores</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Introducción</h4>
            <p>
                Bienvenido al sistema de información web de la academia pre-policial "Los Vencedores".
            </p>
            <p>Para esta versión se presentan las secciones siguientes:</p>
            <ul>
                <li>Registro de Alumnos</li>
                <li>Registro de Docentes</li>
                <li>Registro de Matrícula</li>
                <li>Registro de Notas</li>
                <li>Reportes y Gráficos</li>
            </ul>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>

            <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('/login') }}">Ingresar</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="{{ url('/login') }}">Ingresar</a></li>
            </ul>
        </div>
    </nav>

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            
            <h1 class="header center orange-text">
                Bienvenido a la Academia
                <br>
                Pre-Policial
                <br>
                "Los Vencedores"
            </h1>
            <div class="row center">
                <h5 class="header col s12 light">Academia pre policial</h5>
                <img src="{{ asset('images/escudo.png') }}" alt="Escudo de la academia" height="260">
            </div>
            <div class="row center">
                <a href="{{ route('login') }}" id="download-button" class="btn-large waves-effect waves-light orange">
                    Accede al sistema
                </a>
                <a class="waves-effect waves-light btn-large" href="#modal1">
                    Ayuda en línea
                </a>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="section">
            <!--   Icon Section   -->
            <div class="row">

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center">Misión</h5>
                        <p class="light">La Academia Pre-Policial Los Vencedores, es una Institución Educativa que tiene la misión de preparar, capacitar, orientar y entrenar adecuadamente a todos los alumnos que desean ingresar con éxito a la Policía Nacional. Utilizando métodos educativos modernos, acorde con la realidad nacional, contando para ello, con personal docente e instructores policiales altamente calificados.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                        <h5 class="center">Visión</h5>
                        <p class="light">En el 2020 ser una entidad reconocida por su excelencia en innovación con un talento humano íntegro y competente, basados en la enseñanza de principios morales y disciplina, creando conciencia de contracción al estudio y amor a la patria, logrando el ingreso de nuestros alumnos a la escuela de formación de la Policía Nacional del Perú.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                        <h5 class="center">Propuesta de valor</h5>
                        <p class="light">La academia Pre-Policial Los Vencedores forma estudiantes de nivel con un pensamiento crítico, creativo y moral desarrollado a través de metodologías didácticas, que le permiten comprender la realidad y enfrentar un mundo cambiante, con personal competente mediante el mejoramiento continuo y procesos pedagógicos-físicos que generan altos niveles en estándares de calidad educativa.</p>
                    </div>
                </div>        
            </div>
        </div>
        <br><br>
    </div>

    <footer class="page-footer orange">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Factor Diferenciador</h5>
                    <p class="grey-text text-lighten-4">El Colegio provee una enseñanza de calidad, con docentes calificados, en una localización tranquila y ambientes adecuados para el desenvolvimiento de las actividades del alumno.</p>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Enlaces</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Enlaces</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Desarrollado por <a class="orange-text text-lighten-3" href="http://programacionymas.com" target="_blank">PYM</a>
            </div>
        </div>
    </footer>

    <script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script>
        $('.modal').modal();
    </script>

    <!-- Start of losvencedores Zendesk Widget script -->
    <script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(e){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var e=this.createElement("script");n&&(this.domain=n),e.id="js-iframe-async",e.src="https://assets.zendesk.com/embeddable_framework/main.js",this.t=+new Date,this.zendeskHost="losvencedores.zendesk.com",this.zEQueue=a,this.body.appendChild(e)},o.write('<body onload="document._l();">'),o.close()}();
        /*]]>*/</script>
    <!-- End of losvencedores Zendesk Widget script -->
</body>
</html>
