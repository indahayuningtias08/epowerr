<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>ePower!</title>

    <!-- Bootstrap -->
    <link href="{{ asset('') }}assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('') }}assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('') }}assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('') }}assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('') }}assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('') }}assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('') }}assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('') }}assets/build/css/custom.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    @stack('css')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('layouts.sidebar')

        <!-- top navigation -->
        @include('layouts.navbar')
        <!-- /top navigation -->

         <!-- page content -->
         <div class="right_col" role="main">
          @yield('content')
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('') }}assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('') }}assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('') }}assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ asset('') }}assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="{{ asset('') }}assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="{{ asset('') }}assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('') }}assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="{{ asset('') }}assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="{{ asset('') }}assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{ asset('') }}assets/vendors/Flot/jquery.flot.js"></script>
    <script src="{{ asset('') }}assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('') }}assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="{{ asset('') }}assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="{{ asset('') }}assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('') }}assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{ asset('') }}assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="{{ asset('') }}assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('') }}assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="{{ asset('') }}assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{ asset('') }}assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('') }}assets/vendors/moment/min/moment.min.js"></script>
    <script src="{{ asset('') }}assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('') }}assets/build/js/custom.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    @stack('js')
	
  </body>
</html>