<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale('es')) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Junta Chiquinquira</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('select2-develop/dist/css/select2.css')}}"  rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/modulo.css') }}">



        <!-- Scripts --> 
        <script
            src="https://code.jquery.com/jquery-2.1.0.min.js"
            integrity="sha256-8oQ1OnzE2X9v4gpRVRMb1DWHoPHJilbur1LP9ykQ9H0="
        crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{asset('select2-develop/dist/js/select2.js')}}" defer></script>

        <script src="{{asset('js/main.js')}}"></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ 'Modulo JDC chiquinquira'}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret mr-4"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role =='admin')
                                    <a href="{{ route('register') }}"  class="dropdown-item" >Registrar usuario</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">

                <div class="wrapper">
                    <!-- Sidebar  -->
                    <nav id="sidebar">
                        <div id="sidebarCollapse" class="sidebar-header">
                            <h3>Herramientas</h3>
                            <strong>MD</strong>
                        </div>

                        <ul class="list-unstyled components">
                            <li class="active">

                                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                    <i class="fas fa-home"></i>
                                    Horas Voluntariado

                                </a>
                                <ul class="collapse list-unstyled" id="homeSubmenu">
                                    @if(Auth::user()->role =='admin')
                                    <li>
                                        <a href="{{Route('horas')}}">añadir horas de voluntarios</a>
                                    </li>
                                    @endif
                                    @if (date('m') >6)

                                    @for ($i = 6; $i <=12; $i++)
                                    <li>
                                        <a href="{{ url('/verHoras')}}/{{$i}}">ver horas del mes {{$i}}</a>
                                    </li>
                                    @endfor
                                    @else
                                    @for ($i = 1; $i <=6; $i++)
                                    <li>
                                        <a href="{{ url('/verHoras')}}/{{$i}}">ver horas del mes {{$i}}</a>
                                    </li>
                                    @endfor
                                    @endif

                                </ul>
                            </li>


                        </ul >


                        



                    </nav>

                    <!-- Page Content  -->
                    <div id="content">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>

    </body>
</html>
