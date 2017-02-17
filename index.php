<!DOCTYPE html>
<html>
<head>
	<title>.</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top:20px">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<form role="form"  id="login-form" autocomplete="off">
					<fieldset>
						<h2 class="text-center">Login Area</h2>
						<hr class="colorgraph">
						<div class="form-group">
							<input type="text" name="username" id="username" value="admin" class="form-control input-lg" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" value="admin" class="form-control input-lg" placeholder="Password">
						</div>
						<span class="button-checkbox">
							<button type="button" class="btn" data-color="info">Remember Me</button>
							<input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
							<a href="" class="btn btn-link pull-right">Lupa Password?</a>
						</span>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
								<button class="btn btn-lg btn-success btn-block" type="submit" id="login_button">Log in</button>
							</div>
						</div>
						<div style='margin-top: 10px' id="error"></div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/validation.min.js"></script>
	<script type="text/javascript" src="assets/js/login.js"></script>
</body>
</html>
