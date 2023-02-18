<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="{{url('/')}}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ url('/')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="{{ url('/assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
  <link id="pagestyle" href="{{ url('/')}}/assets/css/style.css" rel="stylesheet" />
</head>
<body>
<div id="main-wrapper">

<div class="wrapper_login">
    <div class="logo"> <img src="{{ url('/assets/img/logo.png') }}" alt="logo"> </div>
    <div class="text-center mt-4 name"> Real Estate </div>
    <div>
      @if(Session::has('message'))
          {{ Session::get('message') }}
      @endif
    </div>
    <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-field d-flex align-items-center"> 
        	<span class="mdi mdi-account-outline"></span> 
        	<input type="text" name="uname" id="userName" placeholder="Username"> 
        </div>
        <div class="form-field d-flex align-items-center"> 
        	<span class="mdi mdi-key-variant"></span> 
        	<input type="password" name="pass" id="pwd" placeholder="Password"> 
        </div> 

        <button class="btn mt-3">Login</button>
    </form>

    <!-- <div class="text-center fs-6"> <a href="#">Forget password?</a> </div> -->
</div>

</div>
 <!--   Core JS Files   -->
  <script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ url('/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ url('/assets/js/plugins/perfect-scrollbar.min.js')  }}"></script>
  <script src="{{ url('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ url('/assets/js/plugins/chartjs.min.js') }}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ url('/assets/js/material-dashboard.min.js?v=3.0.0') }}"></script>
</body>

</html>