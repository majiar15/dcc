<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale('es')) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Junta Chiquinquira</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('assets/bootstrap-4.4.1/css/bootstrap.css')}}">
        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
              
                margin: 0;
            }



            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        <div class="list col-xl-12">
        @if (Route::has('login'))
        <div class="top-right links font-center">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}" >Iniciar sesión</a>
            @endauth
        </div>
         @endif
        </div>


    
        <div class="principal" >
       
        
        <p>Defensa Civil<br>Junta Chiquinquira 
        </p>
    
     </div>
             
            
        <div class="content">

            <section class="posts">

           
                <div class="card mb-3 post" style="width:80%; margin-top:15px">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                      <img src="{{asset('img/Diciplina.jpeg')}}" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Curso Comunicaciones 2019</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3 post" style="width:80%;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                      <img src="{{asset('img/Diciplina.jpeg')}}" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Curso Comunicaciones 2019</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3 post" style="width:80%;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                      <img src="{{asset('img/Diciplina.jpeg')}}" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Curso Comunicaciones 2019</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3 post" style="width:80%;">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                      <img src="{{asset('img/Diciplina.jpeg')}}" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Curso Comunicaciones 2019</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>

            </section>
            
            



        </div>
    <script src="{{ asset ('assets/bootstrap-4.4.1/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/main.js')}}" ></script>

    </body>
</html>
