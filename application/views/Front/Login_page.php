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
	<div class="row no-gutters mx-auto">
		<div class="col-3 col-xls">
			<div class="d-flex position-relative" style="z-index: 2;">
				<a href="#" class="ml-auto back-button-login-page">
					<div class="btn back bg-dark py-3 px-4 rounded-circle shadow mt-2" style="margin-right: -16px;" onclick="goBack()">
						<span class="fas fa-chevron-left text-white"></span>
					</div>
				</a>
			</div>
		</div>
		<div class="col col-xls">
			<div class="card w-75 border-0 mx-left text-white rounded position-relative px-4 pt-4 card-login-page" style="z-index: 1; background-color: #1a2027">
				<div class="card-body">
					<div class="row no-gutters" id="header">
						<div class="margin-left-tambah-login-page">
							<button class="btn text-secondary bg-transparent border-0 font-weight-bold active" onclick="changeTab('login')">Login</button>
						</div>
						<div>
							<button class="btn text-secondary bg-transparent border-0 font-weight-bold" onclick="changeTab('register')">Register</button>
						</div>
					</div>

					<!-- Login -->
					<div class="single-tab" id="login">
						<form action="<?= base_url('auth/login') ?>" method="POST" class="p-5 form form-login">
							<div class="row justify-content-center">
								<div class="col-md-10 muncul-pesan"></div>
							</div>
							<div class="form-group">
								<label for="Email" class="font-weight-bold">Username or Email</label>
								<input type="text" class="form-control bg-dark border-0 text-white usernameEmail col-sm" id="Email" autocomplete="off" aria-describedby="emailHelp" placeholder="Username or Email">
							</div>
							<div class="form-group">
								<label for="Password" class="font-weight-bold">Password</label>
								<input type="password" class="form-control bg-dark border-0 text-white password col-sm" id="Password" placeholder="Password">
							</div>

							<button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Login</button>
							<a href="#" class="text-white d-block text-right mt-3">forgot password</a>
						</form>
					</div>

					<!-- AKhir login -->

					<!-- register -->
					<div class="single-tab" id="register">
						<form action="<?= base_url('auth/registrasi') ?>" method="POST" class="p-5 form form-daftar">
							<div class="row justify-content-center">
								<div class="col-md-10 muncul-pesan-daftar"></div>
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
								<input type="password" class="form-control bg-dark text-white password" id="password" placeholder="Password" onkeyup="check_password()" required>
							</div>
							<div class="form-group">
								<label for="ConfirmPassword" class="font-weight-bold">Confirm Password</label>
								<input type="password" class="form-control bg-dark text-white verifypassword" id="confirm_password" placeholder="Confirm Password" onkeyup="check_password()" required>
								<span class="d-block text-right ml-auto mt-0">
									<small id="pesan"></small>
								</span>
							</div>
							<button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Register</button>
						</form>
					</div>
					<!-- akhir register -->

					<div class="text-center text-white mt-3 text-mobile font-weight-bold">or login with</div>
					<div class="row p-5">
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
</script>