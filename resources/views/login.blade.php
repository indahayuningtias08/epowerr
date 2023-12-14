<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{ asset('') }}assets/assets/https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('') }}assets/assets/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('') }}assets/assets/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url('assets/assets/images/bg_mpa.jpg');">
	<section class="ftco-section">
		<div class="container">
		<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				<img src="{{ asset('') }}assets/assets/images/mpa.png" alt="..." class="img-circle profile_img">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
					<form action="{{ route('login.action') }}" method="POST" class="signin-form">
					@csrf 	
		      		<div class="form-group">
		      			<input type="text" name="username" class="form-control" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" >Sign In</button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('') }}assets/assets/js/jquery.min.js"></script>
  <script src="{{ asset('') }}assets/assets/js/popper.js"></script>
  <script src="{{ asset('') }}assets/assets/js/bootstrap.min.js"></script>
  <script src="{{ asset('') }}assets/assets/js/main.js"></script>
 

	</body>
</html>
@include('sweetalert::alert')


