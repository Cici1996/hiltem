
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SiHiltem</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/theme/css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/theme/css/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/theme/css/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/theme/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/theme/css/mainlogin.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/logo-login.png" alt="IMG">
				</div>

				<form method="POST" class="login100-form validate-form" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-title">
						Member Login
					</span>
					<div class>
					</div>

					<div class="wrap-input100">
						<input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Username" value="{{ old('email') }}" required>
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="wrap-input100 validate-input">
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="assets/theme/js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/theme/js/popper.min.js"></script>
	<script src="assets/theme/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/theme/js/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/theme/js/mainlogin.js"></script>

</body>
</html>