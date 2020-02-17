<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login | Besaf</title>
	<link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>css/login.css">
	<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico">
</head>

<body style="background-image: url(<?= base_url('img/backlogin.jpg') ?>)">

	<div class="header">
		<img src="<?= base_url('img/logo.png') ?>" alt="">
	</div>

	<div class="modal-content">
		<div class="modal-header">
			<div class="row" id="head">
				<div class="col-auto lgn">
					<button type="button" class="btn text-white font-weight-bold lgn active" onclick="changeTab('login')">LOGIN</button>
				</div>
				<div class="col-auto rgs">
					<button type="button" class="btn text-white font-weight-bold rgs" onclick="changeTab('register')">REGISTER</button>
				</div>
			</div>
		</div>
		<div class="modal-body">


			<div class="single-tab log" id="login">
				<form action="<?= base_url('besaf/logIn') ?>" method="post" class="form">
					<input type="text" placeholder="Username or Email" name="emailUsername" class="form-control mt-3 mb-4" autocomplete="off" required style="text-transform:lowercase">
					<input type="password" name="pass" id="" placeholder="Password" required class="form-control mb-4" autocomplete="off">
					<div class="">
						<a href="#" class="forgot">Forgot password</a>
					</div>
					<button type="submit" class="btn btn-login text-center">Login</button>
				</form>

				<p>or login with</p>
				<div class="row alternate">
					<div class="col-md fb btn btn-primary">Facebook</div>
					<div class="col-md ggl btn btn-danger">Google</div>
				</div>
			</div>


			<div class="single-tab" id="register">
				<form action="<?= base_url('besaf/reg') ?>" method="post" class="form">
					<input type="text" name="nama" id="" placeholder="Name" class="form-control mt-3 mb-3" autocomplete="off" required>
					<input type="text" name="username" id="" placeholder="Username" class="form-control mt-3 mb-3" autocomplete="off" required>
					<input type="email" name="email" id="" placeholder="Email" class="form-control mt-3 mb-3" autocomplete="off" required>
					<select class="form-control" id="exampleFormControlSelect1" aria-placeholder="Select your country" name="region" required>
						<option>Select your country...</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Singapore">Singapore</option>
						<option value="Malaysia">Malaysia</option>
						<option value="Thailand">Thailand</option>
						<option value="Vietnam">Vietnam</option>
					</select>
					<input type="password" name="pass" id="" placeholder="Password" autocomplete="none" required class="form-control mt-3 mb-3" required>
					<input type="password" name="confirmpass" id="" placeholder="Confirm Password" autocomplete="none" required class="form-control mt-3 mb-3" required>
					<div class="form-group form-check pl-0">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="exampleCheck1">
							<label class="custom-control-label" for="exampleCheck1">I agree to the Terms of Service</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="exampleCheck2">
							<label class="custom-control-label" for="exampleCheck2">I want to receive newsletter email from Besaf</label>
						</div>
					</div>
					<button type="submit" class="btn btn-login text-center">Register</button>
				</form>
				<p class="text-center">or login with</p>
				<div class="row alternate">
					<div class="col-md fb btn btn-primary">Facebook</div>
					<div class="col-md ggl btn btn-danger">Google</div>
				</div>
			</div>


		</div>
	</div>

	<script>
		function changeTab(tab) {
			var x = document.getElementsByClassName('single-tab');
			for (var i = 0; i < x.length; i++) {
				x[i].style.display = 'none';
			}
			document.getElementById(tab).style.display = 'block';
		}

		//active button
		var header = document.getElementById('head');
		var btns = header.getElementsByClassName('btn');

		for (var i = 0; i < btns.length; i++) {
			btns[i].addEventListener('click', function() {
				var current = document.getElementsByClassName('active');
				current[0].className = current[0].className.replace(" active", "");
				this.className += " active";
			});
		}
	</script>
</body>

</html>