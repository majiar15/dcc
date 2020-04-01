
<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale('es')) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JDC chiquinquira</title>
    <meta name="description" content="Sasha - Blogging HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- Import Icon Packs -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/elegent-icons.css')}}">


    <!-- Import External Scrpit CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">

    <!-- Import Template CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themes.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->

    <script src="{{asset('assets/js/modernizr-2.8.3.min.js')}}"></script>

</head>


<body>

    <div class="overlay-wrapper">

        <header class="masthead">
            <div class="header-top">
                <div class="container">
                    <div class="side-menu-trigger"><span class="trigger-icon"><i class="icon_menu"></i></span></div><!-- /.side-menu-trigger -->
                    <a class="navbar-brand hidden-xs" href="./"><p class="LogoDcc">Defensa Civil <br> <span> Junta Chiquinquira</span></p></a>
                    <div class="menu-search">
                        <div class="form-trigger"><i class="icon_search"></i></div>
                        <form action="#">
                            <input type="text" name="search" id="menu-search" placeholder="Search here..">
                        </form>
                    </div>

                    <nav class="sidebar-menu">
                        <a class="navbar-brand" href="./"><img src="{{asset('img/logoDcc.png')}}" alt="Logo defensa civil"></a>
                        <span class="menu-close"><i class="icon_close"></i></span>

                        <ul class="nav navbar-nav">
                            <li class="menu-item menu-item-has-children active">
                                <a href="{{Route('/')}}">Home</a>
                                
                            </li>

                            <li class="menu-item menu-item-has-children">
                               <a href="#">Categorias</a>
                                    <ul class="sub-menu children">
                                        <li><a href="{{Route('category.index',['id' => 3])}}">Posts de gestion del riesgo</a></li>
                                        <li><a href="{{Route('category.index',['id' => 1])}}">Post de accion social</a></li>
                                        <li><a href="{{Route('category.index',['id' => 2])}}">Posts de gestion Ambiental</a></li>
                                        <li><a href="{{Route('category.index',['id' => 4])}}">Posts de capacitacion</a></li>
                                        
                                    </ul>
                            </li>
                            
                            <li class="menu-item"><a href="{{ route('login') }}">Login</a></li>
                           
                            <li class="menu-item"><a href="contact.html">contacto</a></li>
                        </ul><!-- /.navbar-nav -->

                        <div class="menu-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div><!-- /.menu-social -->
                    </nav><!-- /.sidebar-menu -->
                </div><!-- /.container -->
            </div><!-- /.header-top -->

            <div class="header-bottom">
                <div class="container">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand visible-xs" href="./"><p>JDC Chiquinquira</p></a>
                        </div>

                        <div id="main-menu" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="menu-item menu-item-has-children active">
                                    <a href="{{Route('/')}}">Home</a>
                                  
                                </li>

                                <li class="menu-item menu-item-has-children">
                                    <a href="#">Categorias</a>
                                    <ul class="sub-menu children">
                                        <li><a href="{{Route('category.index',['id' => 3])}}">Posts de gestion del riesgo</a></li>
                                        <li><a href="{{Route('category.index',['id' => 1])}}">Post de accion social</a></li>
                                        <li><a href="{{Route('category.index',['id' => 2])}}">Posts de gestion Ambiental</a></li>
                                        <li><a href="{{Route('category.index',['id' => 4])}}">Posts de capacitacion</a></li>
                                        
                                    </ul>
                                </li>
                               
                                <li class="menu-item"><a href="{{ route('login') }}">Login</a></li>
                                <li class="menu-item"><a href="contact.html">contacto</a></li>
                            </ul><!-- /.navbar-nav -->
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div><!-- /.container -->
            </div><!-- /.header-bottom -->
        </header><!-- /.masthead -->
