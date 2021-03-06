<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta-title', 'Administrar')</title>

    <!-- Bootstrap Core CSS -->
    <link href="/admin-template/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/admin-template/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin-template/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/admin-template/morrisjs/morris.css" rel="stylesheet">
    @stack('styles')

    <!-- Custom Fonts -->
    <link href="/admin-template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/admin-css.css" rel="stylesheet" type="text/css">

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('dashboard') }}">Panel de administrador</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li class="text-center">
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}

                            <button class="btn btn-primary btn-xs"><i class="fa fa-sign-out fa-fw"></i> Logout</button>

                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.user') }}">Administrar usuarios</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.user.create') }}">Crear un usuario</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-folder-open fa-fw"></i> Asignaturas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.subject') }}">Administrar asignaturas</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.subject.create') }}">Crear una asignatura</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('admin.document') }}"><i class="fa fa-file-text fa-fw"></i> Documentos</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.matricula') }}"><i class="fa fa-book fa-fw"></i> Administrar matriculas</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-suitcase fa-fw"></i> Cursos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.category') }}">Administrar cursos</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.create') }}">Crear un curso</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope-o fa-fw"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.post') }}">Administrar posts</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.post.create') }}">Crear un post</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('admin.contact.index') }}"><i class="fa fa-book fa-fw"></i> Contact me messages</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@yield('meta-title-header', 'Administraci??n')</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        @include('admin.partials.messages')

        @yield('content')

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/admin-template/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/admin-template/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/admin-template/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/admin-template/raphael/raphael.min.js"></script>
<script src="/admin-template/morrisjs/morris.min.js"></script>
<script src="/admin-template/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/admin-template/dist/js/sb-admin-2.js"></script>

@stack('scripts')

</body>

</html>
