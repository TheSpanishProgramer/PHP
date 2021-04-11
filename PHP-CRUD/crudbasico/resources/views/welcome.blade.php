<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <title>Wired Players</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap core CSS -->
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link href="{{asset('css/bootstrap-edited.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.css')}}" rel="stylesheet">

    <!-- Template styles -->
    <style>
        /* TEMPLATE STYLES */

        html,
        body,
        .view {
            height: 100%;
        }

        /* Navigation*/

        .navbar {
            background-color: transparent;
        }

        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }

        .top-nav-collapse {
            background-color: #121212;
        }

        footer.page-footer {
            background-color: #121212;
            margin-top: 2rem;
        }

        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #121212;
            }
        }

        /*Call to action*/

        .flex-center {
            color: #fff;
        }

        .view {
            background-color: #333;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        /*Contact section*/

        #contact .fa {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1C2331;
        }

        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: #cb2b40 !important;
        }

        .nav-item {
            margin-left: 20px;
        }
    </style>

</head>

<body>

<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar" style="font-size: 15px;">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">
            <img alt="Brand" src="http://via.placeholder.com/20x20"
                 style="max-height: 20px; display: inline;"> Lorem ipsum
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link "><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about"><i class="fa fa-heart" aria-hidden="true"></i>About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#best-features"><i class="fa fa-server" aria-hidden="true"></i>Servers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact"><i class="fa fa-info-circle" aria-hidden="true"></i> How to play</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-comments" aria-hidden="true"></i> Forum </a>
                </li>
                <li class="nav-item">
                    @if(!empty(Auth::user()))
                        <a class="nav-link" href="{{url('/home')}}"><i class="fa fa-user"
                                                                       aria-hidden="true"></i> {{Auth::user()->name}}
                        </a>
                    @else
                        <a class="nav-link" href="{{url('/login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>
                            Log in</a>
                    @endif
                </li>
            </ul>

        </div>
    </div>
</nav>
<!--/.Navbar-->

<!--Mask-->
<div class="view hm-black-strong">
    <div class="full-bg-img flex-center">


        <ul>
            <li>
                <img src="http://via.placeholder.com/470x270" class="img-responsive center-block" style="max-width: 100%">
            </li>
            <li>
                <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            </li>
            <li>
                <a href="{{url('/login')}}"
                   class="btn btn-default btn-lg wow fadeInLeft" data-wow-delay="0.2s" rel="nofollow">Join us</a>
                <a target="_blank" href="#"
                   class="btn btn-primary btn-lg wow fadeInRight" data-wow-delay="0.2s" rel="nofollow"
                   style="background-color: #bb2b3e;">Forum</a>
            </li>
        </ul>

    </div>
</div>
<!--/.Mask-->

<!-- Main container-->
<div class="container">

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeIn" data-wow-delay="0.2s">Lorem ipsum</h2>
    </div>

    <!--Section: Nosotros-->
    <section id="about" class="text-center wow fadeIn" data-wow-delay="0.2s">
        <div class="row">
            <div class="col-lg-3">
                <!--Card-->
                <div class="card wow fadeIn">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <img src="{{asset('img/developer.jpg')}}"
                             class="img-fluid" alt="">
                        <a>
                            <div class="mask"></div>
                        </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block text-center">
                        <!--Title-->
                        <h4 class="card-title">Lorem ipsum</h4>
                        <hr>
                        <!--Text-->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</p>
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
            <div class="col-lg-3">
                <!--Card-->
                <div class="card wow fadeIn" data-wow-delay="0.6s">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <img src="{{asset('img/support.jpg')}}"
                             class="img-fluid" alt="">
                        <a>
                            <div class="mask"></div>
                        </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block text-center">
                        <!--Title-->
                        <h4 class="card-title">Lorem ipsum</h4>
                        <hr>
                        <!--Text-->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</p>
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
            <!--Second columnn-->
            <div class="col-lg-3">
                <!--Card-->
                <div class="card wow fadeIn" data-wow-delay="0.2s">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <img src="{{asset('img/certificacion-icon.png')}}"
                             class="img-fluid" alt="">
                        <a>
                            <div class="mask"></div>
                        </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block text-center">
                        <!--Title-->
                        <h4 class="card-title">Lorem ipsum</h4>
                        <hr>
                        <!--Text-->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</p>
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
            <!--Second columnn-->
            <!--Second columnn-->
            <div class="col-lg-3">
                <!--Card-->
                <div class="card wow fadeIn" data-wow-delay="0.2s">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <img src="http://via.placeholder.com/470x270"
                             class="img-fluid" alt="">
                        <a>
                            <div class="mask"></div>
                        </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block text-center">
                        <!--Title-->
                        <h4 class="card-title">Lorem ipsum</h4>
                        <hr>
                        <!--Text-->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</p>
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
            <!--Second columnn-->
        </div>
        <br/>
        <br/>
        <br/>
        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</h5>

    </section>

    <!--Section: Nosotros-->

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeIn">Lorem ipsum</h2>
    </div>

    <!--Section: Contact-->
    <section id="contact" class="text-center wow fadeIn">
        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</h5>
        <br/>
        <div class="row">


            <div class="col-lg-4">
                <!--Card-->
                <div class="card wow fadeIn">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <img src="http://via.placeholder.com/470x270"
                             class="img-fluid" alt="">
                        <a>
                            <div class="mask"></div>
                        </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block text-center">
                        <!--Title-->
                        <h4 class="card-title">Lorem ipsum</h4>
                        <hr>
                        <!--Text-->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</p>
                        <!--Text-->
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>
            <div class="col-lg-4">
                <!--Card-->
                <div class="card wow fadeIn">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <img src="http://via.placeholder.com/470x270"
                             class="img-fluid" alt="">
                        <a>
                            <div class="mask"></div>
                        </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block text-center">
                        <!--Title-->
                        <h4 class="card-title">Lorem ipsum</h4>
                        <hr>
                        <!--Text-->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</p>
                        <!--Text-->
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>

            <div class="col-lg-4">
                <!--Card-->
                <div class="card wow fadeIn">

                    <!--Card image-->
                    <div class="view overlay hm-white-slight">
                        <img src="http://via.placeholder.com/470x270"
                             class="img-fluid" alt="">
                        <a>
                            <div class="mask"></div>
                        </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-block text-center">
                        <!--Title-->
                        <h4 class="card-title">Lorem ipsum</h4>
                        <hr>
                        <!--Text-->
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.
                        </p>
                        <!--Text-->
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->
            </div>


        </div>
    </section>
    <!--Section: Contact-->

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeIn">Lorem ipsum</h2>
    </div>

    <!--Section: Best features-->
    <section id="best-features" class="text-center">
        <img src="http://via.placeholder.com/200x170" class="img-responsive block-center" style="max-width: 200px">
        <br/>
        <br/>
        <h5 class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.</h5>
        <br/>
        <h5 class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam..</h5>
        <br/>
    </section>
    <!--/Section: Best features-->

</div>
<!--/ Main container-->


<!--Footer-->
<footer class="page-footer center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-12 text-center">
                <h5 class="title">CLorem ipsum </h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam.
                    <strong> <i class="fa fa-envelope teal-text"></i>  info@example.com</strong></p>
            </div>
            <!--/.First column-->

        </div>
    </div>
    <!--/.Footer Links-->

    <hr>

    <!--/.Call to action-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2017 Copyright: <a href="{{url('/')}}"> Lorem ipsum  </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->


<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/jquery-2.2.3.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tether.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.js')}}"></script>


</body>

</html>