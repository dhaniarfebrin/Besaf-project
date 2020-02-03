<div class="container">
	<div class="card w-50 border-0 bg-black mx-auto text-white rounded-0">
		<div class="card-body">
			<div class="row no-gutters" id="header">
				<div class="">
					<button class="btn text-secondary bg-transparent border-0 font-weight-bold active" onclick="changeTab('login')">Login</button>
				</div>
				<div class="">
					<button class="btn text-secondary bg-transparent border-0 font-weight-bold" onclick="changeTab('register')">Register</button>
				</div>
			</div>

			<!-- Login -->
			<div class="single-tab" id="login">
				<form action="" method="POST" class="p-5">
					<div class="form-group">
						<label for="Email" class="font-weight-bold">Username or Email</label>
						<input type="email" class="form-control bg-dark border-0 text-white" id="Email" aria-describedby="emailHelp" placeholder="Username or Email">
					</div>
					<div class="form-group">
						<label for="Password" class="font-weight-bold">Password</label>
						<input type="password" class="form-control bg-dark border-0 text-white" id="Password" placeholder="Password">
					</div>

					<button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Login</button>
					<a href="<?= base_url('Auth/Forgot_password') ?>" class="text-white d-block text-center mt-3">Forgot password</a>
				</form>
			</div>

			<!-- AKhir login -->

			<!-- register -->
			<div class="single-tab" id="register">
				<form action="" method="POST" class="p-5">
					<div class="form-group">
						<label for="Name" class="font-weight-bold">Name</label>
						<input type="text" class="form-control bg-dark border-0 text-white" id="Name" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="username" class="font-weight-bold">Username</label>
						<input type="text" class="form-control bg-dark border-0 text-white" id="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="Email" class="font-weight-bold">Email</label>
						<input type="email" class="form-control bg-dark border-0 text-white" id="Email" placeholder="Email">
					</div>
					<div class="form-group">
						<label for="" class="font-weight-bold">Country</label>
						<select class="custom-select bg-dark border-0 text-white">
							<option selected>Country..</option>
							<option value="">Indonesia</option>
							<option value="">Singapore</option>
							<option value="">Malaysia</option>
							<option value="">Thailand</option>
							<option value="">Vietnam</option>
							<option value="">Philipines</option>
							<option value="">Myanmar</option>
							<option value="">Brunei</option>
							<option value="">Cambodia</option>
							<option value="">Laos</option>
						</select>
					</div>
					<div class="form-group">
						<label for="Password" class="font-weight-bold">Password</label>
						<input type="password" class="form-control bg-dark border-0 text-white" id="Password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="ConfirmPassword" class="font-weight-bold">Confirm Password</label>
						<input type="password" class="form-control bg-dark border-0 text-white" id="ConfirmPassword" placeholder="Confirm Password">
					</div>
					<button type="submit" class="btn btn-primary text-black font-weight-bold mt-4 w-100">Register</button>
				</form>
			</div>
			<!-- akhir register -->

			<div class="text-center text-white mt-3">or login width</div>
			<div class="row p-5">
				<div class="col">
					<button class="btn btn-primary w-100 fb">Facebook</button>
				</div>
				<div class="col">
					<button class="btn btn-danger w-100 ggl">Google</button>
				</div>
			</div>
		</div>
	</div>
</div>