<?
$country = [
	'Indonesia',
	'Malaysia',
	'Brunei Darussalam',
	'Singapura'
];
?>
<div class="container">
	<div class="row no-gutters mx-auto">
		<div class="col-3">
			<div class="d-flex position-relative" style="z-index: 2;">
				<a href="<?= base_url() ?>" class="ml-auto">
					<div class="btn back bg-dark py-3 px-4 rounded-circle shadow mt-2" style="margin-right: -16px;">
						<span class="fas fa-chevron-left text-white"></span>
					</div>
				</a>
			</div>
		</div>
		<div class="col">
			<div class="card w-75 border-0 mx-left text-white rounded position-relative px-4 pt-4" style="z-index: 1; background-color: #1a2027">
				<div class="card-body">
					<div class="row no-gutters" id="header">
						<div>
							<button class="btn text-secondary bg-transparent border-0 font-weight-bold active" onclick="changeTab('login')">Login</button>
						</div>
						<div>
							<button class="btn text-secondary bg-transparent border-0 font-weight-bold" onclick="changeTab('register')">Register</button>
						</div>
					</div>

					<!-- Login -->
					<div class="single-tab" id="login">
						<!-- //
						// IKI NAR BENAKNO
						// -->
						<div class="row justify-content-center">
							<div class="col-md-10 muncul-pesan"></div>
						</div>
						<!-- // • • • • • -->
						<form action="<?= base_url('auth/login') ?>" method="POST" class="p-5 form form-login">
							<div class="form-group">
								<label for="Email" class="font-weight-bold">Username or Email</label>
								<input type="text" class="form-control bg-dark border-0 text-white usernameEmail" id="Email" autocomplete="off" aria-describedby="emailHelp" placeholder="Username or Email">
							</div>
							<div class="form-group">
								<label for="Password" class="font-weight-bold">Password</label>
								<input type="password" class="form-control bg-dark border-0 text-white password" id="Password" placeholder="Password">
							</div>

							<button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Login</button>
							<a href="#" class="text-white d-block text-right mt-3">forgot password</a>
						</form>
					</div>

					<!-- AKhir login -->

					<!-- register -->
					<div class="single-tab" id="register">
						<!-- //
						// IKI PISAN NAR
						// -->
						<div class="row justify-content-center">
							<div class="col-md-10 muncul-pesan-daftar"></div>
						</div>
						<!-- // • • • • • -->
						<form action="<?= base_url('auth/registrasi') ?>" method="POST" class="p-5 form form-daftar">
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
								<input type="password" class="form-control bg-dark border-0 text-white regpassword" id="Password" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="ConfirmPassword" class="font-weight-bold">Confirm Password</label>
								<input type="password" class="form-control bg-dark border-0 text-white verifypassword" id="ConfirmPassword" placeholder="Confirm Password">
							</div>
							<button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Register</button>
						</form>
					</div>
					<!-- akhir register -->

					<div class="text-center text-white mt-3">or login width</div>
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