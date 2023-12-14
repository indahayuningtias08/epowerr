<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Memanggil URL yang memberikan jumlah data Project ID
    $.ajax({
      url: "{{ route('projectid.count') }}",
      type: "GET",
      success: function(response) {
        $('#projectCount').text(response.count);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Memanggil URL yang memberikan jumlah data Client
    $.ajax({
      url: "{{ route('client.count') }}",
      type: "GET",
      success: function(response) {
        $('#clientCount').text(response.count);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Memanggil URL yang memberikan jumlah data Vendor
    $.ajax({
      url: "{{ route('vdor.count') }}",
      type: "GET",
      success: function(response) {
        $('#vendorCount').text(response.count);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Memanggil URL yang memberikan jumlah data Bank
    $.ajax({
      url: "{{ route('bank.count') }}",
      type: "GET",
      success: function(response) {
        $('#bankCount').text(response.count);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
</script>

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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="text-align: center">
            <div class="profile_pic mx-auto w-100">
                <img src="{{ asset('') }}assets/assets/images/logo.png" alt= "..." width="150" height="50">
              </div>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>General</h3> -->
                <ul class="nav side-menu">
                  <li><a href="home"><i class="fa fa-home" ></i> Dashboard </a>
                  </li>
                  <br>
                  <h3>MASTER</h3>
                  <br>
                  <li><a href="projectid"><i class="fa fa-bar-chart"></i> Data Project ID </a></li>
                  <li><a href="client"><i class="fa fa-users"></i> Data Client </a></li>
                  <li><a href="vdor"><i class="fa fa-user"></i> Data Vendor </a></li>
                  <li><a href="bank"><i class="fa fa-bank"></i> Data Bank </a></li>
                  <br>
                  <h3>MPA</h3>
                  <br>
                  <li><a href="mpa2020"><i class="fa fa-database"></i> Invoice MPA</a>
                  </li>
                  </li>
                    
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item" style="padding-left: 15px;">
                <a href="javascript:;"  style="color:white" aria-haspopup="true"  aria-expanded="false"> 
                  {{ \Carbon\Carbon::now()->formatLocalized('%A, %d %B %Y') }} ||
                  </a>
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('storage/photos/'.$user->photo) }}" alt="">{{ auth()->user()->username}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{ route('profile.index') }}"> Profile</a>
                      <!-- <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a> -->
                    <a class="dropdown-item"  href="logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <!-- <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a> -->
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{ asset('') }}assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{ asset('') }}assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{ asset('') }}assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="{{ asset('') }}assets/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

         <!-- page content -->
         <div class="right_col" role="main">
    <div class="px-2 bg-light">
    <marquee class="py-3" style="font-size: 20px; font-weight: bold; color: #YourDesiredColor;">
    Selamat Datang di Website e-POWER - PT. Multi Power Abadi - Tetap Semangat !!!
</marquee>


<div class="container mt-4">
    <div class="row">
        <!-- Card 1 - Data Project ID -->
        <div class="col-md-6 mb-4">
            <div class="card bg-red text-white text-center">
                <div class="card-body">
                    <i class="fa fa-bar-chart fa-4x mb-5"></i>
                    <h5 class="card-title">Data Project ID</h5>
                    <p class="card-text">Jumlah data: <span id="projectCount"></span></p>
                </div>
            </div>
        </div>

        <!-- Card 2 - Data Client -->
        <div class="col-md-6 mb-4">
            <div class="card bg-secondary text-white text-center">
                <div class="card-body">
                    <i class="fa fa-users fa-4x mb-5"></i>
                    <h5 class="card-title">Data Client</h5>
                    <p class="card-text">Jumlah client: <span id="clientCount"></span></p>
                </div>
            </div>
        </div>

    </div> <!-- End of the first row -->

    <div class="row">

        <!-- Card 3 - Data Vendor -->
        <div class="col-md-6 mb-4">
            <div class="card bg-info text-white text-center">
                <div class="card-body">
                    <i class="fa fa-user fa-4x mb-5"></i>
                    <h5 class="card-title">Data Vendor</h5>
                    <p class="card-text">Jumlah vendor: <span id="vendorCount"></span></p>
                </div>
            </div>
        </div>

        <!-- Card 4 - Data Bank -->
        <div class="col-md-6 mb-4">
            <div class="card bg-dark text-white text-center">
                <div class="card-body">
                    <i class="fa fa-bank fa-4x mb-5"></i>
                    <h5 class="card-title">Data Bank</h5>
                    <p class="card-text">Jumlah bank: <span id="bankCount"></span></p>
                </div>
            </div>
        </div>

    </div> <!-- End of the second row -->
</div>

        </div>
    </div>
</div>

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
	
  </body>
</html>