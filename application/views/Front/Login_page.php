<?
$country = [
	'Indonesia',
	'Malaysia',
	'Brunei Darussalam',
	'Singapura'
];
?>
<a href="<?= base_url() ?>">
	<img src="<?= base_url() ?>assets/Front/img/logo.png" alt="" class="mr-auto p-3" width="200px">
</a>
<div class="container">
	<input type="hidden" class="kode" value="<?= $verificationcode; ?>">
	<div class="mx-auto">
		<div class="col col-xls">
			<div class="card border-0 mx-auto text-white rounded position-relative px-4 pt-4 pb-4 card-login-page" style="z-index: 1; background-color: #1A2027">
				<div class="card-header bg-transparent border-bottom-0 p-0">
					<div class="d-flex position-relative" style="z-index: 2;">
						<a class="mr-auto back-button-login-page" onclick="goBack()">
							<div class="btn back bg-transparent py-3 px-4 rounded-0 m-0" style="margin-right: -16px;">
								<span class="fas fa-chevron-left"></span>
							</div>
						</a>
					</div>
				</div>
				<div class="card-body">
					<!-- Login -->
					<div class="single-tab" id="login">
						<h3 class="text-center font-weight-bold">Sign in to Besaf</h3>
						<p class="m-0 text-secondary text-center mb-0">
							Is this your first time? <a onclick="changeTab('register')" class="text-white hover">Register now</a>
						</p>
						<form action="<?= base_url('auth/login') ?>" method="POST" class="p-5 form form-login">
							<div class="justify-content-center">
								<div class="muncul-pesan"></div>
							</div>
							<div class="form-group">
								<label for="Email" class="font-weight-bold">Username or Email</label>
								<input type="text" class="form-control bg-dark border-0 text-white usernameEmail col-sm" id="Email" autocomplete="off" aria-describedby="emailHelp" placeholder="Username or Email">
							</div>
							<div class="form-group">
								<label for="Password" class="font-weight-bold">Password</label>
								<div class="input-group">
									<input type="password" class="form-control bg-dark border-0 text-white password col-sm" id="Password" placeholder="Password">
									<div class="input-group-append">
										<button type="button" class="btn btn-secondary bg-dark border-0" id="eye"><span class="far fa-eye"></span></button>
									</div>
								</div>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="exampleCheck2">
								<label class="custom-control-label" for="exampleCheck2">Keep me in</label>
							</div>
							<button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Let me in</button>
						</form>
						<div class="d-block text-center mt-1">
							<p class="m-0 text-secondary">
								Lost your password? <a href="<?= base_url('auth/forgotpassword') ?>" class="forgot" style="color: white">Click here</a>
							</p>
						</div>
					</div>
					<!-- AKhir login -->
					<!-- register -->
					<div class="single-tab" id="register">
						<h4 class="text-center font-weight-bold">Create your Account</h4>
						<div class="d-block text-center mb-3">
							<p class="text-secondary">Already have an account? <a class="text-white hover" onclick="changeTab('login')">Go Back</a></p>
						</div>
						<form action="<?= base_url('auth/registrasi') ?>" method="POST" class="p-5 form form-daftar">
							<div class="justify-content-center">
								<div class="w-100 muncul-pesan-daftar"></div>
							</div>
							<div class="form-group">
								<label for="Name" class="font-weight-bold">Fullname</label>
								<input type="text" class="form-control bg-dark border-0 text-white fullname" autocomplete="off" id="Name" placeholder="Fullname">
							</div>
							<div class="form-group">
								<label for="username" class="font-weight-bold">Username</label>
								<input type="text" autocomplete="off" class="form-control bg-dark border-0 text-white username" id="username" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="Email" class="font-weight-bold">Email</label>
								<input type="email" class="form-control bg-dark border-0 text-white email" id="Email" placeholder="Email" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="" class="font-weight-bold">Country</label>
								<select class="custom-select bg-dark border-0 text-white country">
									<option selected disabled>Select your country...</option>
									<? foreach ($country as $c) : ?>
										<option value="<?= $c; ?>"><?= $c;  ?></option>
									<? endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="Password" class="font-weight-bold">Password</label>
								<input type="password" class="form-control bg-dark text-white regpassword" id="password" placeholder="Password" onkeyup="check_password()">
							</div>
							<div class="form-group">
								<label for="ConfirmPassword" class="font-weight-bold">Confirm Password</label>
								<input type="password" class="form-control bg-dark text-white verifypassword" id="confirm_password" placeholder="Confirm Password" onkeyup="check_password()">
								<span class="d-block text-right ml-auto mt-0">
									<small id="pesan"></small>
								</span>
							</div>
							<div class="form-group form-check pl-0 mt-3">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="exampleCheck1">
									<label class="custom-control-label" for="exampleCheck1">I agree to the Terms of Service</label>
								</div>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="exampleCheck2">
									<label class="custom-control-label" for="exampleCheck2">I want to receive newsletter email from Besaf</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Create my account</button>
						</form>
					</div>
					<!-- akhir register -->
					<div class="text-center text-secondary mt-4 mb-3 text-mobile font-weight-bold">or login with</div>
					<div class="row px-5">
						<!-- button facebook -->
						<div class="col">
							<button class="btn btn-primary w-100 fb">Facebook</button>
						</div>
						<!-- end button -->
						<!-- button google -->
						<div class="col">
							<button class="btn btn-danger w-100 ggl">Google</button>
						</div>
						<!-- end button -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function check_password() {
		var password1 = document.getElementById('password')
		var password2 = document.getElementById('confirm_password')
		var valPassword1 = document.getElementById('password').value
		var valPassword2 = document.getElementById('confirm_password').value
		if (valPassword1 == "" && valPassword2 == "") {
			password2.classList.remove("border");
			document.getElementById("pesan").className = "d-none";
		} else {
			// pencocokan inputan password
			if (valPassword1 == valPassword2) {
				password2.classList.remove("border-danger");
				password2.classList.add("border");
				password2.classList.add("border-success");
				document.getElementById("pesan").innerHTML = "Match";
				document.getElementById("pesan").className = "text-success";
			} else if (valPassword1 != valPassword2) {
				password2.classList.remove("border-success");
				password2.classList.add("border");
				password2.classList.add("border-danger");
				document.getElementById("pesan").innerHTML = "Not Match";
				document.getElementById("pesan").className = "text-danger";
			}
		}
	}
	var passwordField = document.getElementById('Password');
	var eyeIcon = document.getElementById('eye');
	eyeIcon.addEventListener("mousedown", function() {
		passwordField.setAttribute("type", "text");
	});
	eyeIcon.addEventListener("mouseup", function() {
		passwordField.setAttribute("type", "password");
	});
	eyeIcon.addEventListener("mouseleave", function() {
		passwordField.setAttribute("type", "password");
	})
</script>