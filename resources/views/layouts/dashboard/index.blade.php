<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale('es')) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Junta Chiquinquira</title>

        <!-- Custom fonts for this template-->
        <link href="{{asset('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{asset('select2-develop/dist/css/select2.css')}}"  rel="stylesheet" />
        <link href="{{asset('css/modulo.css')}}" rel="stylesheet">
        <!-- boostrap style-->
        <link rel="stylesheet" href="{{asset('assets/bootstrap-4.4.1/css/bootstrap.min.css')}}"/>
        <!-- Custom styles for this template-->
        
        <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
        
        

 
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">JDC Chiquinquira </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

   

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-clock"></i>
                        <span>Horas Voluntariado</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item" href="{{Route('horas')}}">Registrar Horas</a>
                          
                            <a class="collapse-item" href="{{ url('/verHoras').'/1'}}">consultar operatividad <br> {{date('Y').' - 1'}}</a>
                          
                            <a class="collapse-item" href="{{ url('/verHoras').'/2'}}">consultar operatividad <br> {{date('Y').' - 2'}}</a>
                           
                            
                                    
                        </div>
                    </div>
                </li>
                
                   
                       
                        
                @if(Auth::user()->role =='admin')     
                    <!--Nav Item - posts Collapse Menu--> 
                   <li class="nav-item">
                       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                           <i class="fas fa-clipboard"></i>
                           <span>Publicaciones</span>
                       </a>
                       <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                           <div class="bg-white py-2 collapse-inner rounded">
                               <h6 class="collapse-header">herramientas post:</h6>
                               <a class="collapse-item" href="{{route('storePost')}}">Crear publicacion</a>
                               <a class="collapse-item" href="{{route('post.crud')}}">Buscar publicacion</a>
                               
                           </div>
                       </div>
                   </li>
                @endif
                <!-- Divider -->
                <hr class="sidebar-divider">


            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        @yield('search')

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

               

                      

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name}}</span>
                                    @if(Auth::user()->sexo == 'masculino')
                                        <img class="img-profile rounded-circle" src="{{asset('img/avatar-hombredcc.png')}}">
                                    @else
                                        <img class="img-profile rounded-circle" src="{{asset('img/avatar-mujerdcc.png')}}">
                                    @endif
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    @if(Auth::user()->role == 'admin')
                                        <a class="dropdown-item" href="{{ route('register') }}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Registrar Voluntario
                                        </a>

                                        <div class="dropdown-divider"></div>
                                    @endif
                                   
                                    <a class="dropdown-item"  href="{{ route('logout') }}"  data-toggle="modal" data-target="#logoutModal">
                                        
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cerrar sesión
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        @yield('content')


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

               

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿estas seguro de salir?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">seleccione "Cerrar sessión" a continuacion si esta listo para finalizar su sessión actual</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">cancelar</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      Cerrar sesión
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap-4.4.1/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('js/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
        <script src="{{asset('select2-develop/dist/js/select2.js')}}" defer></script>
        <script src="{{asset('js/main.js')}}"></script>


    </body>

</html>
