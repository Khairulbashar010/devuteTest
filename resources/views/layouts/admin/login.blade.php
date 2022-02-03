<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

<!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/backend_auth/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
      <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="{{ asset('assets/backend/css/custom.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}">Login </a>
  </div>
  <!-- /.login-logo -->
@yield('content')
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/backend_auth/iCheck/icheck.min.js') }}"></script>

<script type="text/javascript">
  var state= false;
  function toggle(){
    if(state){
      document.getElementById("password").setAttribute("type","password");
      document.getElementById("eye").style.color='#7a797e';
      state = false;
    }
    else{
      document.getElementById("password").setAttribute("type","text");
      document.getElementById("eye").style.color='#5887ef';
      state = true;
    }
  }
</script>
</body>
</html>