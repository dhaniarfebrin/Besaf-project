<!DOCTYPE html>
<html lang="en">
<?
$country = [
	'Indonesia',
	'Malaysia',
	'Brunei Darussalam',
	'Singapura'
];
?>

<head>
	<meta charset="UTF-8">
	<title>BESAF</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="<?= base_url() ?>/favicon.ico" />
</head>

<body>
	<div class="jumbotron jumbotron-fluid section1">
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<img src="<?= base_url() ?>img/logo.png" class="img1" alt="">
				</div>
				<div class="col-sm"></div>
			</div>
			<div class="row">
				<div class="col-sm yangKiri">
					<h1 class="display-5 title1">PLAY TOGETHER</h1>
					<h5 class="subtitle1">EVERYDAY, EVERY WEEK, EVERYTIME</h5>
					<p class="lead desc">Play more to win prizes with tons and activities inside.
						Create your own team to join tournaments and level up!</p>
					<button type="button" class="btn btn-reg reg col-sm" data-toggle="modal" data-target="#staticBackdrop">Register or Login<div class="col-sm"></div></button>
				</div>
				<div class="col-sm">
					<img src="<?= base_url('img/img1.png') ?>" alt="" width="600px" class="img2">
				</div>
			</div>
			<div class="col-md list">
				<h1 class="display-5 title1">JUST PLAY. AUTOMATICALLY</h1>
				<h5 class="subtitle1">EVERYTHING DONE AUTOMATICALLY. JUST SIT, PLAY, AND WIN!</h5>
			</div>
			<div class="row col-sm">
				<div class="col-auto fitur">
					<div class="mb-3">
						<img src="https://yamisok.com/assets/images/landing/new/header/Lobby.png" alt="" width="80" class="img-fitur">
					</div>
					<div class="subList">Lobby Creation</div>
				</div>
				<div class="col-auto fitur">
					<div class="mb-3">
						<img src="https://yamisok.com/assets/images/landing/new/header/Invite.png" alt="" width="80" class="img-fitur">
					</div>
					<div class="subList">Invite players</div>
				</div>
				<div class="col-auto fitur">
					<div class="mb-3">
						<img src="https://yamisok.com/assets/images/landing/new/header/Stream.png" alt="" width="80" class="img-fitur">
					</div>
					<div class="subList">Stream and records</div>
				</div>
				<div class="col-auto fitur">
					<div class="mb-3">
						<img src="https://yamisok.com/assets/images/landing/new/header/validate-winner.png" alt="" width="80" class="img-fitur">
					</div>
					<div class="subList">Validate winner</div>
				</div>
				<div class="col-auto fitur">
					<div class="mb-3">
						<img src="https://yamisok.com/assets/images/landing/new/header/analyzing-stats.png" alt="" width="80" class="img-fitur">
					</div>
					<div class="subList">Analyzing stats</div>
				</div>
			</div>
		</div>
	</div>

	<div class="jumbotron jumbotron-fluid mb-0" style="background: url('<?= base_url('img/background2.jpg') ?>');">
		<div class="container">

			<h1 class="display-5 title1 text-center mb-5">THE EVENTS</h1>
			<div class="tournament">
				<div class="event mb-5 mt-5">
					<div class="row">
						<div class="col-md-2 img">
							<img src="<?= base_url('img/cosplay.jpg') ?>" alt="" width="100%" height="100%">
						</div>
						<div class="col-md body-event w-100">
							<div class="">
								<div class="judul-event mx-0 my-0">
									<div class="w-100">
										<div class="judul">
											<h5 class="judev">Cosplay Competition</h5>
											<div class="ml-auto mr-3">
												<label class="badge badge-danger">Ongoing</label>
											</div>
										</div>
									</div>
								</div>
								<table class="table table-borderless">
									<thead>
										<tr class="text-grey">
											<th scope="col-md-3">PRIZE</th>
											<th scope="col-md-3">SLOTS</th>
											<th scope="col-md-3">DATE</th>
											<th scope="col-md-3">TIME</th>
										</tr>
									</thead>
									<tbody class="text-white">
										<tr class="mb-0">
											<td class="col-md-3">IDR 2.000.000</td>
											<td class="col-md-3">6/320</td>
											<td class="col-md-3">13 Jan 2020</td>
											<td class="col-md-3">09:00 GMT +7</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="event mb-5">
					<div class="row">
						<div class="col-md-2 img">
							<img src="<?= base_url('img/logocompe.jpg') ?>" alt="" width="100%" height="100%">
						</div>
						<div class="col-md body-event w-100">
							<div class="">
								<div class="judul-event mx-0 my-0">
									<div class="w-100">
										<div class="judul">
											<h5 class="judev">DBklik Logo Design Competition</h5>
											<div class="ml-auto mr-3">
												<label class="badge badge-warning">Upcoming</label>
											</div>
										</div>
									</div>
								</div>
								<table class="table table-borderless">
									<thead>
										<tr class="text-grey">
											<th scope="col-md-3">PRIZE</th>
											<th scope="col-md-3">SLOTS</th>
											<th scope="col-md-3">DATE</th>
											<th scope="col-md-3">TIME</th>
										</tr>
									</thead>
									<tbody class="text-white">
										<tr class="mb-0">
											<td class="col-md-3">1 UNIT MONITOR GAMING</td>
											<td class="col-md-3">54/64</td>
											<td class="col-md-3">18 Jan 2020</td>
											<td class="col-md-3">08:00 GMT +7</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="event mb-5">
					<div class="row">
						<div class="col-md-2 img">
							<img src="<?= base_url('img/dignity.jpg') ?>" alt="" width="100%" height="100%">
						</div>
						<div class="col-md body-event w-100">
							<div class="">
								<div class="judul-event mx-0 my-0">
									<div class="w-100">
										<div class="judul">
											<h5 class="judev">Besaf Digital Neo-Society Festival</h5>
											<div class="ml-auto mr-3">
												<label class="badge badge-secondary">Over</label>
											</div>
										</div>
									</div>
								</div>
								<table class="table table-borderless">
									<thead>
										<tr class="text-grey">
											<th scope="col-md-3">PRIZE</th>
											<th scope="col-md-3">SLOTS</th>
											<th scope="col-md-3">DATE</th>
											<th scope="col-md-3">TIME</th>
										</tr>
									</thead>
									<tbody class="text-white">
										<tr class="mb-0">
											<td class="col-md-3">IDR 10.000.000</td>
											<td class="col-md-3">325/432</td>
											<td class="col-md-3">6 Des 2019</td>
											<td class="col-md-3">07:00 GMT +7</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="">
				<h5 class="mb-5 desc text-center">Find other events. We offer many popular
					events from Esport Competition to Entertainment Festival for you.</h5>
				<div class="row d-block text-center">
					<img src="https://yamisok.com/assets/images/landing/new/tournament/aov.png" alt="" class="game--list " width="115px">
					<img src="https://yamisok.com/assets/images/landing/new/tournament/csgo.png" alt="" class="game--list " width="115px">
					<img src="https://yamisok.com/assets/images/landing/new/tournament/dota-1v1.png" alt="" class="game--list " width="115px">
					<img src="https://yamisok.com/assets/images/landing/new/tournament/dota-5v5.png" alt="" class="game--list " width="115px">
					<img src="https://yamisok.com/assets/images/landing/new/tournament/mobile-legends.png" alt="" class="game--list " width="115px">
					<img src="https://yamisok.com/assets/images/landing/new/tournament/pubg.png" alt="" class="game--list " width="115px">
				</div>
			</div>

			<a href="<?= base_url('auth/tournament') ?>"><button class="btn btn-tour mt-5">See More Tournament</button></a>
		</div>
	</div>

	<div class="jumbotron jumbotron-fluid mb-0" style="background: url('<?= base_url('img/background3.png') ?>');background-size: cover; background-color: black;">
		<div class="container text-center">
			<img src="https://yamisok.com/assets/images/landing/new/solo-or-team-up/SOLO-OR-TEAM-UP1.png" alt="" class="w-100 mt-5">
			<h1 class="display-5 title1 mt-5">SOLO OR TEAM UP</h1>
			<h5 class="subtitle1">YOUR GAME, YOUR CHOICE</h5>
			<p class="lead desc">Play based on your preferences whether going solo or create awesome team
				and compete among others.</p>
		</div>
	</div>

	<div class="jumbotron jumbotron-fluid mb-0" style="background: url('<?= base_url('img/background4.png') ?>');background-size: cover;padding-bottom: 20;height: 100%; background-color: black;">
		<div class="container">
			<div class="row">
				<div class="col-md text-center mt-5">
					<h1 class="display-5 title1 mt-5">MOBILE APPS</h1>
					<h5 class="subtitle1">INSTANT ACTIVITY TRACK</h5>
					<p class="lead desc">Now you can track your activities on your mobile.
						Do everything right from your pocket.</p>
					<a href="#" target="_blank" class="btn mt-5" style="background-image: url('http://yamisok.com/	assets/images/landing/new/mobile-apps/googleplay.png');padding: 24px 83px;background-color: transparent; background-repeat: no-repeat"></a>
				</div>
				<div class="col-md">
					<img src="http://yamisok.com/assets/images/landing/new/mobile-apps/mobile-apps-2.png" alt="" class="w-100 img3">
				</div>
			</div>

			<div class="row">
				<div class="col-md">
					<img src="http://yamisok.com/assets/images/landing/new/raffle/raffle2.png" alt="" class="img3">
				</div>
				<div class="col-md text-center mt-5 ini">
					<h1 class="display-5 title1 mt-5 ini">RAFFLE</h1>
					<h5 class="subtitle1">FREE ITEMS EVERYDAY</h5>
					<p class="lead desc">Get a chance to Win cool gaming Merchandise and Virtual daily items.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="jumbotron jumbotron-fluid mb-0" style="background-color: #141414 !important;">
		<div class="container text-center">
			<h1 class="display-5 title1 mt-5">PACKED WITH COUNTLESS FEATURES</h1>
			<h5 class="subtitle1">MORE FEATURES FOR YOU TO EXPLORE</h5>
			<p class="lead desc">To make it even more fun, we provide features for you to Join, chat, invite your friends, create communities or even collect daily point to redeem prizes.
				Sweet ! We give you more than just gaming experience.</p>

			<div class="row">
				<div class="col-md-3">
					<h5 class="display-5 title1 mt-5 mb-4">SOCIAL MEDIA</h5>
					<img src="http://yamisok.com/assets/images/landing/new/packed/SOCIAL-MEDIA.jpg" alt="" class="mb-4" width="80%">
					<p class="lead desc">Social and interaction media for every
						player available in Yamisok.</p>
				</div>
				<div class="col-md-3">
					<h5 class="display-5 title1 mt-5 mb-4">STREAMING</h5>
					<img src="http://yamisok.com/assets/images/landing/new/packed/STREAMING.jpg" alt="" class="mb-4" width="80%">
					<p class="lead desc">Share your livestream and favorite
						match moments on social media</p>
				</div>
				<div class="col-md-3">
					<h5 class="display-5 title1 mt-5 mb-4">GAMIFICATION</h5>
					<img src="http://yamisok.com/assets/images/landing/new/packed/GAMIFICATION.jpg" alt="" class="mb-4" width="80%">
					<p class="lead desc">Improve your skill with challenge
						and other features </p>
				</div>
				<div class="col-md-3">
					<h5 class="display-5 title1 mt-5 mb-4">COMMUNITY</h5>
					<img src="http://yamisok.com/assets/images/landing/new/packed/COMMUNITY.jpg" alt="" class="mb-4" width="80%">
					<p class="lead desc">Get latest news and updates
						from your community</p>
				</div>
			</div>
		</div>
	</div>

	<div class="jumbotron jumbotron-fluid mb-0" style="background-color: #191a1e !important;">
		<div class="container">
			<footer>
				<p class="lead desc">© 2020 Besaf Indonesia | Mascitra.com</p>
				<div class="" style="color:#fff;">
					<a href="#" style="color: white;">Terms & Condition</a> | <a href="#" style="color:#fff;">Privacy Policy</a>
				</div>
				<div class="partner row">
					<a href="#">
						<img src="https://yamisok.com/assets/images/landing/fb.png" alt="" width="30" class="mr-2">
					</a>
					<a href="#">
						<img src="https://yamisok.com/assets/images/landing/instagram.png" alt="" width="30" class="mr-2">
					</a>
					<a href="#">
						<img src="https://yamisok.com/assets/images/landing/youtube.png" alt="" width="30" class="mr-2">
					</a>
				</div>
			</footer>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="row" id="head">
						<div class="col-md lgn">
							<button type="button" class="btn text-white font-weight-bold lgn active" onclick="changeTab('login')">LOGIN</button>
						</div>
						<div class="col-md rgs">
							<button type="button" class="btn text-white font-weight-bold rgs" onclick="changeTab('register')">REGISTER</button>
						</div>
					</div>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="single-tab log" id="login">
						<div class="row">
							<div class="col-md-12 muncul-pesan"></div>
						</div>
						<form action="<?= base_url('auth/login') ?>" method="post" class="form form-login">
							<input type="text" placeholder="Username or Email" name="" class="form-control mt-3 mb-4 usernameEmail" autocomplete="off" required>
							<input type="password" name="" id="" placeholder="Password" class="form-control mb-4 password" autocomplete="off">
							<div class="">
								<a href="<?= base_url('auth/forgot_password') ?>" class="forgot">Forgot password</a>
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
						<div class="row">
							<div class="col-md-12 muncul-pesan-daftar"></div>
						</div>
						<form action="<?= base_url('auth/registrasi') ?>" method="post" class="form form-daftar">
							<input type="text" name="" id="" placeholder="Fullname" class="form-control mt-3 mb-3 fullname" autocomplete="off">
							<input type="text" name="" id="" placeholder="Username" class="form-control mt-3 mb-3 username" autocomplete="off">
							<input type="email" name="" id="" placeholder="Email" class="form-control mt-3 mb-3 email" autocomplete="off">
							<select class="form-control country" id="exampleFormControlSelect1" aria-placeholder="Select your country" name="">
								<option selected disabled>Select your country...</option>
								<? foreach ($country as $c) : ?>
									<option value="<?= $c; ?>"><?= $c; ?></option>
								<? endforeach; ?>
							</select>
							<input type="password" name="" id="password" placeholder="Password" autocomplete="none" class="form-control mt-3 mb-3 regpassword" onchange="check_password()">
							<input type="password" name="confirmpass" id="confirm_password" placeholder="Confirm Password" autocomplete="none" class="form-control mt-3 verifypassword" onkeyup="check_password()">
							<span class="d-none text-right ml-auto mt-0 text-danger" id="pesan">
								<small>not match</small>
							</span>
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
		</div>
	</div>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
		//change tab single page
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

		function check_password() {
			var password1 = document.getElementById('password')
			var password2 = document.getElementById('confirm_password')
			var valPassword1 = document.getElementById('password').value
			var valPassword2 = document.getElementById('confirm_password').value

			// pencocokan password
			if (valPassword1 == valPassword2) {
				password2.classList.remove("border-danger");
				password2.classList.add("border");
				password2.classList.add("border-success");
				document.getElementById("pesan").classList.remove("d-block");
				document.getElementById("pesan").classList.add("d-none");
			} else if (valPassword1 != valPassword2) {
				password2.classList.remove("border-success");
				password2.classList.add("border");
				password2.classList.add("border-danger");
				document.getElementById("pesan").classList.remove("d-none");
				document.getElementById("pesan").classList.add("d-block");
			} 
			// else if (valPassword1 == "" && valPassword2 == "") {
			// 	password2.classList.remove("border-success");
			// 	password2.classList.add("border");
			// 	password2.classList.add("border-danger");
			// 	document.getElementById("pesan").classList.remove("d-none");
			// 	document.getElementById("pesan").classList.add("d-block");
			// }
		}
	</script>
	<!-- formjs -->
	<script>
		$(document).ready(function() {
			// LOGIN ajax
			$(document).on('submit', 'form.form-login', function() {
				usernameEmail = $('input.usernameEmail').val()
				password = $('input.password').val()

				$.ajax({
						url: "<?= base_url('api/user/login'); ?>",
						method: 'POST',
						data: {
							usernameEmail: usernameEmail,
							password: password
						},
					})
					.done(function(req) {
						pesan = req.message
						if (req.error == true) {
							notif("div.muncul-pesan", "warning", pesan)
						} else {
							$('div.muncul-pesan').html('')
							user_id = req.data.id
							role_id = req.data.role_id
							username = req.data.username
							window.location = "<?= base_url('auth/session/'); ?>" + role_id + "/" + username + "/" + user_id
						}
					})
				return false
			})
			// REGISTRASI Ajax
			$(document).on('submit', 'form.form-daftar', function() {
				fullname = $('input.fullname').val()
				username = $('input.username').val()
				email = $('input.email').val()
				password = $('input.regpassword').val()
				verifypassword = $('input.verifypassword').val()
				country = $('select.country').val()

				$.ajax({
						url: "<?= base_url('api/user/registrasi'); ?>",
						method: 'POST',
						data: {
							username: username,
							fullname: fullname,
							password: password,
							verifypassword: verifypassword,
							email: email,
							country: country
						},
					})
					.done(function(req) {
						pesan = req.message
						if (req.error == true) {
							notif('div.muncul-pesan-daftar', 'warning', pesan)
						} else {
							notif('div.muncul-pesan', 'success', pesan)
							$('div.muncul-pesan-daftar').val('')
							$('input.username').val('')
							$('input.fullname').val('')
							$('input.email').val('')
							$('input.regpassword').val('')
							$('input.verifypassword').val('')
							changeTab('login');
						}
					})
				return false
			})

			// notifikasi
			function notif(element, type, message) {
				$(element).html('\
				<div class="alert alert-' + type + '" role="alert">\
			        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>\
			        ' + message + '\
			    </div>\
			    ');
			}

			$.ajax({
				url : '<?php echo base_url('api/Turnamen/show') ?>',
				method : "POST",
				success : function(req) {
					html = '';
					$.each(req.data, function(index,obj) {
						if (obj.date_end >= '<?php echo date('Y-m-d') ?>') {
							status = '<label class="badge badge-danger">On going</label>';
						} else {
							status = '<label class="badge badge-secondary">End</label>'
						}
						if (index < 3) {
							console.log(obj);
							html += '\
							<div class="event mb-5 mt-5">\
								<div class="row">\
									<div class="col-md-2 img">\
										<img src="<?= base_url('api/img/turnamen/') ?>'+obj.image+'" alt="" style="width: 100%;">\
									</div>\
									<div class="col-md body-event w-100">\
										<div class="">\
											<div class="judul-event mx-0 my-0">\
												<div class="w-100">\
													<div class="judul">\
														<h5 class="judev">'+obj.nama+'</h5>\
														<div class="ml-auto mr-3">\
															'+status+'\
														</div>\
													</div>\
												</div>\
											</div>\
											<table class="table table-borderless">\
												<thead>\
													<tr class="text-grey">\
														<th class="col-md-3">PRIZE</th>\
														<th class="col-md-3">SLOTS</th>\
														<th class="col-md-3">DATE</th>\
														<th class="col-md-3">TIME</th>\
													</tr>\
												</thead>\
												<tbody class="text-white">\
													<tr class="mb-0">\
														<td class="col-md-3">'+obj.hadiah+'</td>\
														<td class="col-md-3">'+obj.slots+'</td>\
														<td class="col-md-3">'+obj.date_start+'</td>\
														<td class="col-md-3">'+obj.time+'</td>\
													</tr>\
												</tbody>\
											</table>\
										</div>\
									</div>\
								</div>\
							</div>\
							';
						}
					})
					$('div.tournament').html(html);
				}
			})
		});
	</script>
</body>

</html>