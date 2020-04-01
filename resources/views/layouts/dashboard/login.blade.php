<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Junta Chiquinquira</title>

  

  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <style>
      .bg-login-image{
          background: url({{asset('img/pumarejo.jpg')}});
          background-position: center; 
          background-size: cover;
        
      }
      .bg{
background: rgba(73,155,234,1);
background: -moz-linear-gradient(top, rgba(73,155,234,1) 0%, rgba(3,125,255,0.33) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(73,155,234,1)), color-stop(100%, rgba(3,125,255,0.33)));
background: -webkit-linear-gradient(top, rgba(73,155,234,1) 0%, rgba(3,125,255,0.33) 100%);
background: -o-linear-gradient(top, rgba(73,155,234,1) 0%, rgba(3,125,255,0.33) 100%);
background: -ms-linear-gradient(top, rgba(73,155,234,1) 0%, rgba(3,125,255,0.33) 100%);
background: linear-gradient(to bottom, rgba(73,155,234,1) 0%, rgba(3,125,255,0.33) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#037dff', GradientType=0 );
      }

 
  </style>
</head>

<body class="bg">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center box-shadown">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                
                @yield('content')
              </div>
            </div>
          </div>
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
  


</body>

</html>
