<script type="text/javascript">
	$(document).ready(function() {

		function Show_game() {
			$.ajax({
				url: '<?php echo base_url('api/Profile/Show_games') ?>',
				type: 'POST',
				success: function(req) {
					html = '<option value=""></option>';
					$.each(req.data, function(index, obj) {
						html += '<option value="' + obj.id + '">' + obj.game_name + '</option>'
					});
					$('select.select-game').html(html);
				}
			})
		}
		Show_game();

		$(document).on('change', 'select.select-game', function() {
			$.ajax({
				url: '<?php echo base_url('api/Profile/Role_game') ?>',
				type: 'POST',
				data: {
					game_id: this.value
				},
				success: function(req) {
					html = '';
					$.each(req, function(index, obj) {
						html += '<option value="' + obj.id + '">' + obj.name + '</option>'
					});
					$('select.role-game').html(html)
				}
			})

		})

		$(document).on('change', 'input.user_image', function(e) {
			file = e.target.files[0];
			$('label.user_image').html(file.name);
			canvasResize(file, {
				width: 400,
				height: 400,
				crop: true,
				quality: 100,
				callback: function(data) {
					$("input.hidden_photo").val(data);
				}
			})
		})

		$(document).on("submit", "form.Add_photo", function() {
			$user_photo = $("input.hidden_photo").val();
			$.ajax({
				url: "<?= base_url('api/Profile/Add_photo'); ?>",
				type: "POST",
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>',
					photo: $user_photo
				},
				success: function(req) {
					pesan = req.message;
					if (req.error == true) {
						notif("div.muncul_notif6", "danger", pesan);
					} else {
						$("input.hidden_photo").val('');
						$("input.user_photo").val('');
						$("div.photo").modal('hide');
						tampil_info();
						notif("div.notif", "success", pesan);
					}
				}
			})
			return false;
		})



		// AJAX of Change Password
		$(document).on("submit", "form.Change_password", function() {
			id = $("input.Change_password_id").val();
			current_password = $("input.current_password").val();
			new_password = $("input.new_password").val();
			confirm_password = $("input.confirm_password").val();

			$.ajax({
				url: "<?= base_url('api/Profile/Change_password'); ?>",
				method: "POST",
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>',
					current_password: current_password,
					new_password: new_password,
					confirm_password: confirm_password
				},
				success: function(req) {
					pesan = req.message;
					if (req.error == true) {
						notif("div.muncul_notif1", "danger", pesan);
					} else {
						$("input.Change_password_id").val('');
						$("input.current_password").val('');
						$("input.new_password").val('');
						$("input.confirm_password").val('');
						$("div.update_password").modal('hide');
						tampil_info();
						notif("div.notif", 'success', pesan);
					}
				}
			})
			return false;
		})
		// end of AJAX change password


		// AJAX Read player info
		function tampil_info() {
			$.ajax({
				url: "<?php echo base_url('api/Profile/Read_Player_info'); ?>",
				method: "POST",
				data: {
					id: '<?php echo	$this->session->userdata('user_id') ?>'
				},
				async: true,
				success: function(req) {
					baris = "";
					html = "";
					$.each(req.data, function(index, obj) {
						if (obj.gender == '1') {
							gender = 'Laki-laki';
						} else {
							gender = 'Perempuan';
						}
						baris +=
							'<div class="col-2 profile" align="center" >\
								<div style="padding: 10px; margin-left: 15%">\
									<a href="#Add_photo" data-toggle="modal" data-id="' + obj.id + '">\
									<img style="width: 150px;" src="<?php echo base_url('api/img/user_profile/') ?>' + obj.image + '" class="card-img rounded-circle border">\
									</a>\
								</div>\
								</div>\
								<div class="col-10">\
									<div class="card-body">\
										<h5 class="card-title">' + obj.username + '</h5>\
										<small class="text-muted">\
											<h6 style="font-family: sans-serif;">XP<h6>\
											<div class="progress">\
												<div class="progress-bar" role="progressbar" style="width:25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">23%\
												</div>\
											</div>\
										</small><br>\
											<button type="button" class="btn btn-info btn-sm settings"><i class="flaticon-settings-1" data-toggle="modal" data-target="#settings" data-id="' + obj.id + '" data-password="' + obj.password + '"> Settings</i></button>\
											<button type="button" class="btn btn-info btn-sm"><i data-toggle="modal" data-target="#Followers"> 0 <span>Follower</span></i></button>\
											<button type="button" class="btn btn-info btn-sm"><i data-toggle="modal" data-target="#Following"> 0 <span>Following</span></i></button>\
										</div>\
									</div>\
								</div>';
						html +=
							'<div class="m-portlet__head">\
									<div class="m-portlet__head-caption">\
										<div class="m-portlet__head-title" style="display: block;">\
											<h3 class="m-portlet__head-text" style="font-family: arial black;">\
												Player Info\
											</h3>\
										</div>\
										<div>\
											<button style="margin-left: 200px" class="btn btn-warning btn-sm update" data-toggle="modal" data-target="#edit_profile" data-id="' + obj.id + '" data-fullname="' + obj.full_name + '" data-country="' + obj.country + '" data-birth_date="' + obj.birth_date + '" data-gender="' + obj.gender + '" data-city="' + obj.city + '" data-adress="' + obj.adress + '" data-phone_number="' + obj.phone_number + '" data-email="' + obj.email + '"><i class="flaticon-edit"> Edit</i>\
											</button>\
										</div>\
									</div>\
								</div>\
								<div class="m-portlet__body">\
									<table class="table Info">\
										<tbody>\
											<tr>\
												<td>Name</td>\
												<td style="text-align: right;">' + obj.full_name + '</td>\
											</tr>\
											<tr>\
												<td>Country</td>\
												<td style="text-align: right;">' + obj.country + '</td>\
											</tr>\
											<tr>\
												<td>Birth Date</td>\
												<td style="text-align: right;">' + obj.birth_date + '</td>\
											</tr>\
											<tr>\
												<td>Gender</td>\
												<td style="text-align: right;">' + gender + '</td>\
											</tr>\
											<tr>\
												<td>City</td>\
												<td style="text-align: right;">' + obj.city + '</td>\
											</tr>\
											<tr>\
												<td>Phone Number</td>\
												<td style="text-align: right;">' + obj.phone_number + '</td>\
											</tr>\
											<tr>\
												<td>Email</td>\
												<td style="text-align: right;">' + obj.email + '</td>\
											</tr>\
										</tbody>\
									</table>\
								</div>';

					});
					$('div.profile').html(baris);
					$('div.data-user').html(html);
				}
			})
		}

		tampil_info();
		// end of AJAX READ player info


		// AJAX Update Player info
		$(document).on("click", "button.update", function() {
			id = $(this).data('id');
			full_name = $(this).data('fullname');
			country = $(this).data('country');
			birth_date = $(this).data('birth_date');
			gender = $(this).data('gender');
			city = $(this).data('city');
			adress = $(this).data('adress');
			phone_number = $(this).data('phone_number');
			email = $(this).data('email');

			$("input.id").val(id);
			$("input.fullname").val(full_name);
			$("select.country").val(country).trigger("change");
			$("input.birth_date").val(birth_date);
			$("select.gender").val(gender).trigger("change");
			$("input.city").val(city);
			$("textarea.adress").val(adress);
			$("input.phone_number").val(phone_number);
			$("input.email").val(email);

		});

		$(document).on("submit", "form.edit_profile", function() {
			id = $("input.id").val();
			fullname = $("input.fullname").val();
			country = $("select.country").val();
			birth_date = $("input.birth_date").val();
			gender = $("select.gender").val();
			city = $("input.city").val();
			adress = $("textarea.adress").val();
			phone_number = $("input.phone_number").val();
			email = $("input.email").val();

			if (fullname == "") {
				notif("div.muncul_notif2", "danger", "Fullname column is required.");
			} else if (country == "") {
				notif("div.muncul_notif2", "danger", "Please!!!...Select your Country.");
			} else if (birth_date == "") {
				notif("div.muncul_notif2", "danger", "Date of Birth column is required.");
			} else if (gender == "") {
				notif("div.muncul_notif2", "danger", "Please!!!...Select your Gender.");
			} else if (city == "") {
				notif("div.muncul_notif2", "danger", "City column is required.");
			} else if (adress == "") {
				notif("div.muncul_notif2", "danger", "Write your adress.");
			} else if (phone_number == "") {
				notif("div.muncul_notif2", "danger", "Phone number column is required.");
			} else if (email == "") {
				notif("div.muncul_notif2", "danger", "Please!!!...Enter your Email.");
			} else {
				$.ajax({
					url: "<?= base_url('api/Profile/Update_Player_info'); ?>",
					method: "POST",
					data: {
						id: id,
						full_name: fullname,
						country: country,
						birth_date: birth_date,
						gender: gender,
						city: city,
						adress: adress,
						phone_number: phone_number,
						email: email
					},
					success: function(req) {
						pesan = req.message;
						if (req.error == true) {
							notif("div.muncul_notif2", "danger", pesan);
						} else {
							$("input.id").val('');
							$("input.full_name").val('');
							$("select.country").val('');
							$("input.birth_date").val('');
							$("select.gender").val('');
							$("input.city").val('');
							$("textarea.adress").val('');
							$("input.phone_number").val('');
							$("input.email").val('');
							$("div.edit-profile").modal('hide');
							tampil_info();
							notif("div.notif", 'success', pesan);
						}
					}
				})
			}
			return false;

		})
		// end of AJAX update Player info


		// AJAX read about me
		function Read_About_me() {
			$.ajax({
				url: "<?= base_url('api/Profile/Read_About_me'); ?>",
				method: "POST",
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>'
				},
				async: true,
				success: function(req) {
					About_me =
						'<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">\
									<div class="m-portlet__head">\
										<div class="m-portlet__head-caption">\
											<div class="m-portlet__head-title">\
												<h3 class="m-portlet__head-text" style="font-family: arial black;">\
													About Me\
												</h3>\
											</div>\
										</div>\
										<div class="m-portlet__head-tools">\
											<ul class="m-portlet__nav">\
												<li class="m-portlet__nav-item">\
												<button class="btn btn-warning btn-sm update_About_me" data-toggle="modal" data-target="#about_me" data-id="' + req.data.id + '" data-about_me="' + req.data.about_me + '"><i class="fa fa-plus-circle"> add</i></button>\
												</li>\
											</ul>\
										</div>\
									</div>\
									<div class="m-portlet__body" style="overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">\
										<p class="text-center">' + req.data.about_me + '</p>\
									</div>\
								</div>';

					$("div.about_me_div").html(About_me);
				}
			})
		}
		Read_About_me();
		// end of ajax read about me


		// AJAX of update about me
		$(document).on("click", "button.update_About_me", function() {
			About_me = $(this).data('about_me');
			$("textarea.About_me_text").val(About_me);

		})

		$(document).on("submit", "form.About_me_form", function() {
			id = $("input.About_me_id").val();
			About_me = $("textarea.About_me_text").val();

			if (About_me == "") {
				notif("div.muncul_notif3", "danger", "Please insert description about Yourself!!!.");
			} else {
				$.ajax({
					url: "<?= base_url('api/Profile/Update_About_me'); ?>",
					method: "POST",
					data: {
						id: '<?php echo $this->session->userdata('user_id'); ?>',
						about_me: About_me
					},
					success: function(req) {
						console.log(req);
						pesan = req.message;
						if (req.error == true) {
							notif("div.muncul_notif3", 'danger', pesan);
						} else {
							$("input.About_me_id").val('');
							$("textarea.About_me_text").val('');
							$("div.About_me_div").modal('hide');
							Read_About_me();
							notif("div.notif", "success", pesan);

						}
					}
				})
			}
			return false;
		})
		// end of AJAX update about me





		// start AJAX of Career experience

		// upload image
		$(document).on('change', 'input.Career_image', function(e) {
			file = e.target.files[0];
			$('label.image_label').html(file.name);
			canvasResize(file, {
				width: 400,
				height: 400,
				crop: true,
				quality: 100,
				callback: function(data) {
					$("input.hidden_image").val(data);
					$("img.show_image").attr('src', data);
				}
			})
		})
		// end of uploaf image

		// insert 
		$(document).on("submit", "form.Insert_career", function() {
			Career_type = $("input.Career_type").val();
			Career_teamname_or_game_id = $("input.Career_teamname_or_game_id").val();
			Career_select_game = $("select.Career_select_game").val();
			Career_months = $("select.Career_months").val();
			Career_years = $("select.Career_years").val();
			Career_image = $("input.hidden_image").val();

			if (Career_type == "") {
				notif("div.muncul_notif5", "danger", "Please insert your Career type!!!.");
			} else if (Career_teamname_or_game_id == "") {
				notif("div.muncul_notif5", "danger", "Please insert Your Team name or your Solo Id!!!.");
			} else if (Career_select_game == "") {
				notif("div.muncul_notif5", "danger", "Please select your Game!!!.");
			} else if (Career_months == "") {
				notif("div.muncul_notif5", "danger", "Please select your career Months!!!.");
			} else if (Career_years == "") {
				notif("div.muncul_notif5", "danger", "Please select your career Years!!!.");
			} else {
				$.ajax({
					url: "<?= base_url('api/Profile/Insert_Career_experience'); ?>",
					method: "POST",
					data: {
						type: Career_type,
						team_name_or_solo_id: Career_teamname_or_game_id,
						game: Career_select_game,
						months: Career_months,
						years: Career_years,
						image: Career_image,
						user_id: 2
					},
					success: function(req) {
						pesan = req.message;
						if (req.error == true) {
							notif("div.muncul_notif5", "danger", pesan);
						} else {
							$("input.Career_type").val('');
							$("input.Career_teamname_or_game_id").val('');
							$("select.Career_select_game").val('');
							$("select.Career_months").val('');
							$("select.Career_years").val('');
							$("input.hidden_image").val();
							$("div.Career").modal('hide');
							tampil_info();
							notif("div.notif", "success", pesan);
						}
					}
				})
			}
			return false;
		})

		// read
		function Read_career_experience() {
			$.ajax({
				url: "<?= base_url('api/Profile/Read_Career_experience'); ?>",
				method: "POST",
				data: {
					user_id: 2
				},
				async: true,
				success: function(req) {
					career = "";
					$.each(req.data, function(index, obj) {
						career +=
							'<div class="col-md-2">\
										<img style="width: 90%; float: left; " class="rounded" src="<?= base_url("api/img/"); ?>" ?>"\
									</div>\
									<div class="col-md-5">\
											<h6 style="margin-toh6: 4%">' + obj.teamname_or_solo_id + '</h6>\
											<h6 style="margin-toh6: 4%">' + obj.full_name + '</h6>\
											<h6 style="margin-toh6: 4%">' + obj.name + '</h6>\
									</div>\
									<div class="col-md float-right text-right">\
										<button class="btn btn-gray btn-sm update_career" data-toggle="modal" data-target="#Update_career" data-type="' + obj.type + '" data-team_or_id="' + obj.teamname_or_solo_id + '" data-game="' + obj.name + '" data-months="' + obj.career_months + '" data-years="' + obj.career_years + '"><i class="flaticon-edit"></i></button>\
										<h6 style="margin-top: 7%">\
											' + obj.career_months + '-' + obj.career_years + '\
										</h6>\
									</div>'
					});
					$("div.show_career").html(career);
					$.each(req.data, function(index, obj) {
						game = "";
						''
					});
				}
			})
		}
		Read_career_experience();


		// update
		$(document).on("click", "button.update_career", function() {
			Career_type = $(this).data('type');
			Career_teamname_or_game_id = $(this).data('teamname_or_solo_id');
			Career_select_game = $(this).data('game');
			Career_months = $(this).data('months');
			Career_years = $(this).data('years');
			Career_image = $(this).data('image	');
		});
		$("input.").data('type');
		$(this).data('teamname_or_solo_id');
		$(this).data('game');
		$(this).data('months');
		$(this).data('years');
		$(this).data('image	');



		// upload image
		$(document).on('change', 'input.Career_image', function(e) {
			file = e.target.files[0];
			$('label.image_label').html(file.name);
			canvasResize(file, {
				width: 400,
				height: 400,
				crop: true,
				quality: 100,
				callback: function(data) {
					$("input.hidden_image").val(data);
					$("img.show_image").attr('src', data);
				}
			})
		})
		// end of uploaf image


		$(document).on("submit", "form.Insert_career", function() {
			Career_type = $("input.Career_type").val();
			Career_teamname_or_game_id = $("input.Career_teamname_or_game_id").val();
			Career_select_game = $("select.Career_select_game").val();
			Career_months = $("select.Career_months").val();
			Career_years = $("select.Career_years").val();
			Career_image = $("input.hidden_image").val();

			if (Career_type == "") {
				notif("div.muncul_notif5", "danger", "Please insert your Career type!!!.");
			} else if (Career_teamname_or_game_id == "") {
				notif("div.muncul_notif5", "danger", "Please insert Your Team name or your Solo Id!!!.");
			} else if (Career_select_game == "") {
				notif("div.muncul_notif5", "danger", "Please select your Game!!!.");
			} else if (Career_months == "") {
				notif("div.muncul_notif5", "danger", "Please select your career Months!!!.");
			} else if (Career_years == "") {
				notif("div.muncul_notif5", "danger", "Please select your career Years!!!.");
			} else {
				$.ajax({
					url: "<?= base_url('api/Profile/Update_Career_experience'); ?>",
					method: "POST",
					data: {
						type: Career_type,
						team_name_or_solo_id: Career_teamname_or_game_id,
						game: Career_select_game,
						months: Career_months,
						years: Career_years,
						image: Career_image,
						user_id: 2
					},
					success: function(req) {
						pesan = req.message;
						if (req.error == true) {
							notif("div.muncul_notif5", "danger", pesan);
						} else {
							$("input.Career_type").val('');
							$("input.Career_teamname_or_game_id").val('');
							$("select.Career_select_game").val('');
							$("select.Career_months").val('');
							$("select.Career_years").val('');
							$("input.hidden_image").val();
							$("div.Career").modal('hide');
							tampil_info();
							notif("div.notif", "success", pesan);
						}
					}
				})
			}
			return false;
		})
		// end AJAX of Career experience

		function notif(element, type, message) {
			$(element).html('\
					<div class="alert alert-' + type + '" role="alert">\
				        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" style="margin-top: -20px">&times;</span></button>\
				        ' + message + '\
				    </div>\
			    	');
		}
	});
</script>

<!--end::Page Snippets -->
</body>

<!-- end::Body -->

</html>