<script type="text/javascript">
	$(document).ready(function() {
		/* Read game in select */
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
					$('select.Career_select_game').html(html);
					$('select.career_select_game').html(html);
					$('select.select-game-update').html(html);
				}
			})
		}
		Show_game();

		/* Read role game in select */
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
					$('select.role-game').html(html);
					$('select.role-game-upadate').html(html);
				}
			})
		})




		// start AJAX of change profile image
		/* Insert image profile */
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
		// end AJAX of change profile image





		// AJAX of Change Password
		$(document).on("submit", "form.Change_password", function() {
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





		// start AJAX of Player info
		/* Read player info */
		function tampil_info() {
			$.ajax({
				url: "<?php echo base_url('api/Profile/Read_Player_info'); ?>",
				method: "POST",
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>'
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

						if (obj.image == '' || obj.image == null) {
							image = "default.jpg";
						} else {
							image = obj.image
						}

						baris +=
							'<div class="col-2 profile" align="center" >\
								<div style="padding: 10px; margin-left: 10%">\
									<a href="#Add_photo" data-toggle="modal" data-id="' + obj.id + '">\
									<img style="width: 150px;" src="<?php echo base_url('api/img/user_profile/') ?>' + image + '" class="card-img rounded-circle border">\
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
											<button style="margin-left: 200px" class="btn btn-warning btn-sm update" data-toggle="modal" data-target="#edit_profile" data-fullname="' + obj.full_name + '" data-country="' + obj.country + '" data-birth_date="' + obj.birth_date + '" data-gender="' + obj.gender + '" data-city="' + obj.city + '" data-adress="' + obj.adress + '" data-phone_number="' + obj.phone_number + '" data-email="' + obj.email + '"><i class="flaticon-edit"> Edit</i>\
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

		/* Update Player info */
		$(document).on("click", "button.update", function() {
			full_name = $(this).data('fullname');
			country = $(this).data('country');
			birth_date = $(this).data('birth_date');
			gender = $(this).data('gender');
			city = $(this).data('city');
			adress = $(this).data('adress');
			phone_number = $(this).data('phone_number');
			email = $(this).data('email');

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
						id: '<?php echo $this->session->userdata('user_id'); ?>',
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





		// start AJAX of about me
		/* Read about me */
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
												<button class="btn btn-warning btn-sm update_About_me" data-toggle="modal" data-target="#about_me" data-about_me="' + req.data.about_me + '"><i class="fa fa-plus-circle"> add</i></button>\
												</li>\
											</ul>\
										</div>\
									</div>\
									<div class="m-portlet__body" style="overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">\
										<p class="text-center">' + req.data.about_me + '</p>\
									</div>\
								</div>'

					$("div.about_me_div").html(About_me);
				}
			})
		}
		Read_About_me();

		/* update about me */
		$(document).on("click", "button.update_About_me", function() {
			About_me = $(this).data('about_me');

			$("textarea.About_me_text").val(About_me);
		})

		$(document).on("submit", "form.About_me_form", function() {
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
		// end AJAX of about me





		// starts AJAX of skill and role endorsment
		/* Read skill and role */
		function Read_skill_role() {
			$.ajax({
				url: '<?php echo base_url('api/Profile/Read_skill_role'); ?>',
				type: 'POST',
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success: function(req) {
					skill_and_role = "";
					$.each(req.data, function(index, obj) {
						skill_and_role +=
							'<div class="col-md-3 p-2">\
										<div class="card card-rounded card-center" align="center" style="border-radius: 12px;">\
										  <img class="card-img-top" style="width: 80%; padding: 2px; border-radius: 10px; margin-top: 10px" src="<?= base_url('api/img/skill_and_role_image/'); ?>' + obj.image + '" alt="Card image cap">\
											<small align="center" style="margin-top: 10px">' + obj.game_name + '</small>\
											<small style="margin-bottom: 5px">' + obj.role_name + '</small>\
										  <div style="margin-bottom: 5px">\
										  	<button class="btn btn-primary btn-sm float-md-none update-skill-and-role" style="margin-bottom: 5px;" data-toggle="modal" data-target="#skill_and_role_update" data-id="' + obj.id + '" data-game="' + obj.game_id + '" data-role_game="' + obj.role_id + '" data-image="' + obj.image + '"><i class="flaticon-edit"></i> Edit</button>\
										  </div>\
										</div>\
									</div>'

						$("div.tampil_skill_role").html(skill_and_role);
						$("div.delete-and-update").html('\
										<button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px">Done</button>\
										<button type="button" class="btn btn-secondary btn-sm delete-skill-role" style="float: right; margin-right: 12px">Remove</button>\
									');

					});
				}
			})
		}
		Read_skill_role();

		/* Insert skill and role */
		$(document).on('change', 'input.skill-image', function(e) {
			file = e.target.files[0];
			$("label.label-career-image").html(file.name);
			canvasResize(file, {
				width: 400,
				height: 400,
				crop: true,
				quality: 100,
				callback: function(data) {
					$("input.hidden-skill-image").val(data);
					$("img.show_image_skill").attr('src', data);
				}
			})
		});
		$(document).on('submit', 'form.insert-skill-role', function() {
			game = $("select#skill-in-game").val();
			role_in_game = $("select#role-in-game").val();
			image_skill = $("input.hidden-skill-image").val();
			$.ajax({
				url: '<?php echo base_url('api/Profile/Insert_skill_and_role'); ?>',
				type: 'POST',
				data: {
					game: game,
					role: role_in_game,
					image: image_skill,
					id: '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success: function(req) {
					pesan = req.message;
					if (req.error == true) {
						notif("div.muncul_notif9", "danger", pesan);
					} else {
						console.log(req)
						$("select.select-game").val('');
						$("select#role-in-game").val('');
						$("input.hidden-skill-image").val('');
						$("div#skill_and_role").modal('hide');
						tampil_info();
						Read_skill_role();
						notif("div.notif", "success", pesan);
					}
				}
			})
			return false;
		});

		/* Update skill and role */
		$(document).on('change', 'input.skill-image-update', function(e) {
			file = e.target.files[0];
			canvasResize(file, {
				width: 400,
				height: 400,
				crop: true,
				quality: 100,
				callback: function(data) {
					$("input.hidden-skill-image-upadate").val(data);
					$("img.show_image_skill-update").attr('src', data);
				}
			})
		});
		$(document).on('click', 'button.update-skill-and-role', function() {
			id = $(this).data('id');
			select_game = $(this).data('game');
			image = $(this).data('image');

			$.ajax({
				url: '<?php echo base_url('api/Profile/Role_game') ?>',
				type: 'POST',
				data: {
					game_id: select_game
				},
				success: function(req) {
					html = '';
					$.each(req, function(index, obj) {
						html += '<option value="' + obj.id + '">' + obj.name + '</option>'
					});
					$('select.role-game-upadate').html(html);
				}
			})

			$("input.update-skill-role").val(id);
			$("select.select-game-update").val(select_game);
			$("img.show_image_skill-update").attr('src', '<?php echo base_url('api/img/skill_and_role_image/'); ?>' + image);
		});
		// $(document).on('submit', 'form.update-skill-role', function() {

		// });


		/* Delete skill and role */
		$(document).on('click', 'button.delete-skill-role', function() {
			skill_id = $("input.hidden-delete-skill-role").val();

			$.ajax({
				url: '<?php echo base_url('api/Profile/Delete_skill_and_role'); ?>',
				type: 'POST',
				data: {
					id: skill_id
				},
				success: function(req) {
					pesan = req.message;
					$("input.update-skill-role").val('');
					$("div#skill_and_role_update").modal('hide');
					Read_skill_role();
					notif("div.notif", "success", pesan);
				}
			})
		});
		// end AJAX of skill and role endorsment





		// start AJAX of Career experience
		/* Insert career */
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
						user_id: '<?php echo $this->session->userdata('user_id'); ?>'
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
							$("input.hidden_image").val('');
							$('label.image_label').html('');
							$('img.show_image').attr('src', '');
							$("div.Career").modal('hide');
							tampil_info();
							Read_career_experience();
							notif("div.notif", "success", pesan);
						}
					}
				})
			}
			return false;
		})

		/* Read career */
		function Read_career_experience() {
			$.ajax({
				url: "<?= base_url('api/Profile/Read_Career_experience'); ?>",
				method: "POST",
				data: {
					user_id: '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success: function(req) {
					career = "";
					$.each(req.data, function(index, obj) {
						career +=
							'<div class="col-2">\
										<img style="width: 50px; margin-top: 9px" class="rounded" src="<?php echo base_url('api/img/career/'); ?>' + obj.image + '" ?>\
									</div>\
									<div class="col-5">\
											<h6 style="margin-top: 4%">' + obj.teamname_or_solo_id + '</h6>\
											<h6 style="margin-top: 4%">' + obj.type + '</h6>\
											<h6 style="margin-top: 4%">' + obj.game_name + '</h6>\
									</div>\
									<div class="col-5 float-right text-right">\
										<button class="btn btn-gray btn-sm update_career" data-toggle="modal" data-target="#Update_career" data-id="' + obj.id + '" data-type="' + obj.type + '" data-team_or_id="' + obj.teamname_or_solo_id + '" data-game="' + obj.game_id + '" data-months="' + obj.career_months + '" data-years="' + obj.career_years + '" data-image="' + obj.image + '"><i class="flaticon-edit"></i></button>\
										<h6 style="margin-top: 7%">\
											' + obj.career_months + '-' + obj.career_years + '\
										</h6>\
									</div>'
					});
					$("div.show_career").html(career);
					$("div.delete-game").html('\
									<button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-left: 8px">Done</button>\
									<button type="button" class="btn btn-primary btn-sm delete-career" style="float: right; margin-right: 12px">Remove</button>');
				}
			})
		}
		Read_career_experience();

		/* Update career */
		$(document).on('change', 'input.career-image-update', function(e) {
			file = e.target.files[0];
			canvasResize(file, {
				width: 400,
				height: 400,
				crop: true,
				quality: 100,
				callback: function(data) {
					$("input.hidden-image-update").val(data);
					$("img.show-image-update").attr('src', data);
				}
			})
		});
		$(document).on("click", "button.update_career", function() {
			id = $(this).data('id');
			Career_type = $(this).data('type');
			Career_teamname_or_game_id = $(this).data('team_or_id');
			Career_select_game = $(this).data('game');
			Career_months = $(this).data('months');
			Career_years = $(this).data('years');
			Career_image = $(this).data('image');

			$("input.hidden-update-career").val(id);
			$("input.career_type").val(Career_type);
			$("input.career_teamname_or_game_id").val(Career_teamname_or_game_id);
			$("select.career_select_game").val(Career_select_game);
			$("select.career_months").val(Career_months);
			$("select.career_years").val(Career_years);
			$("img.show-image-update").attr('src', '<?php echo base_url('api/img/career/'); ?>' + Career_image);
		});

		$(document).on('submit', 'form.Update_career', function() {
			id = $("input.hidden-update-career").val();
			Career_type = $("input.career_type").val();
			Career_teamname_or_game_id = $("input.career_teamname_or_game_id").val();
			Career_select_game = $("select.career_select_game").val();
			Career_months = $("select.career_months").val();
			Career_years = $("select.career_years").val();
			Career_image = $("input.hidden-image-update").val();

			$.ajax({
				url: '<?php echo base_url('api/Profile/Update_Career_experience'); ?>',
				type: 'POST',
				data: {
					id: id,
					type: Career_type,
					team_name_or_solo_id: Career_teamname_or_game_id,
					game: Career_select_game,
					months: Career_months,
					years: Career_years,
					image: Career_image,
					user_id: '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success: function(req) {
					pesan = req.message;
					if (req.error == true) {
						notif("div.muncul_notif8", "danger", pesan);
					} else {
						$("input.hidden-update-career").val();
						$("input.career_type").val('');
						$("input.career_teamname_or_game_id").val('');
						$("select.career_select_game").val('');
						$("select.career_months").val('');
						$("select.career_years").val('');
						$("input.hidden-image-update").val('');
						$("div#Update_career").modal('hide');
						Read_career_experience();
						notif("div.notif", "success", pesan);
					}
				}
			})
			return false;
		});

		/* Delete career */
		$(document).on('click', 'button.delete-career', function() {
			career_id = $('input.hidden-update-career').val();

			$.ajax({
				url: '<?php echo base_url('api/Profile/Delete_Career_experience'); ?>',
				type: 'POST',
				data: {
					id: career_id
				},
				success: function(req) {
					pesan = req.message;
					$("input.hidden-delete-career").val('');
					$("div#Update_career").modal('hide');
					Read_career_experience();
					notif("div.notif", "success", pesan);
				}
			})
		});
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