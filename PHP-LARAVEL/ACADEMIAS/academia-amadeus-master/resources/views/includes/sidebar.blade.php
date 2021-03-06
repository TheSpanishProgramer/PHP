<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>Amadeus</span></a>
        </div>
        
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenido!</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        
        <br />
        
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Academicos</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-book"></i>Estudiantes<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/estudiantes">Dashboard</a></li>
                            <li><a href="/estudiantes/create">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Representantes<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Profesores<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>A??o escolar<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Secciones<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Clases particulares<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Materias<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="menu_section">
                <h3>Eventos</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i>Conciertos<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Temas<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Instalaciones</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i>Cubiculos<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Horarios<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Equipos<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i>Modalidades<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agregar</a></li>
                            <li><a href="#">Modificar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--<div class="menu_section">
                <h3>Group 1</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Multiple link <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                            <li><a href="#">Link 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-laptop"></i>
                            One link
                            <span class="label label-success pull-right">Flag</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Group 2</h3>
                <ul class="nav side-menu">
                    <li>
                        <a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="#">Level One</a>
                                <li>
                                    <a>Level One<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu">
                                            <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                            <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                            <a href="#">Level Two</a>
                                        </li>
                                    </ul>
                                </li>
                            <li>
                                <a href="#">Level One</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>-->
        
        </div>
        <!-- /sidebar menu -->
        
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>