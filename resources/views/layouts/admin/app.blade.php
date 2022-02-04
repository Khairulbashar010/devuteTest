<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo/icon/favicon.png') }}">
    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/ionicons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

  @stack('css')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/_all-skins.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/backend/css/custom.css') }}">


</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    @include('layouts.admin.partial.topbar')
    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    @include('layouts.admin.partial.sidebar')
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2015-<?php echo date("Y"); ?>

        <a href="#">Devute</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>
  @stack('js')
  <!-- sweetalert2 -->
  <script src="{{ asset('assets/backend/js/sweetalert2.all.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('assets/backend/js/jquery.slimscroll.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('assets/backend/js/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/backend/js/adminlte.min.js') }}"></script>
  <!-- <script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


  <script>
    $(document).ready(function() {
      $('.sidebar-menu').tree()
    })
  </script>
  <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
  </script>
  <script>
    @if($errors-> any())
    @foreach($errors-> all() as $error)
    toastr.error('{{ $error }}', 'Error', {
      closeButton: true,
      progressBar: true,
    });
    @endforeach
    @endif
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
      case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

      case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
      case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
      case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    }
    @endif
  </script>
  <script type="text/javascript">
    function deleteTag(id) {
      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          document.getElementById('delete-form-' + id).submit();
        } else if (
          // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
        ) {
          swal(
            'Cancelled',
            'Your data is safe :)',
            'error'
          )
        }
      })
    }
  </script>
  <!-- Bootstrap Snippet: Change button text & icon on click -->
</body>

</html>