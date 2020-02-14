<div class="main" id="main">
	<div class="container-sm mt-5">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="d-block text-right my-auto p-2 update-avatar">
							
						</div>
						<div class="card-image">
							<div class="pt-3 image-thumbnail">
								<img src="" alt="" style="width: 125px" class="img avatar-admin">
							</div>
						</div>
						<div class="mt-3 text-center">
							<h5 class="card-title text-center font-weight-bold">
								<?= $this->session->userdata('username'); ?>
							</h5>
							<div class="card-text text-secondary user_bio">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<h5 class="p-2">Your info</h5>
								<hr>
							</div>
							<div class="col">
								<div class="d-block text-right my-auto p-2 Update_info">
									
								</div>
							</div>
						</div>
						<div class="container mt-3">
							<table class="table table-borderless text-white mx-auto">
								<tbody>
									<tr>
										<th>Name</th>
										<td class="text-secondary name"></td>
									</tr>
									<tr>
										<th>Email</th>
										<td class="text-secondary email"></td>
									</tr>
									<tr>
										<th>Country</th>
										<td class="text-secondary country"></td>
									</tr>
									<tr>
										<th>City</th>
										<td class="text-secondary city"></td>
									</tr>
									<tr>
										<th>Birth Date</th>
										<td class="text-secondary birth_date"></td>
									</tr>
									<tr>
										<th>Gender</th>
										<td class="text-secondary gender"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-4"></div>
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<h5 class="p-2">About You</h5>
								<hr>
							</div>
							<div class="col">
								<div class="d-block text-right my-auto p-2  update_about_me"> 
								
								</div>
							</div>
						</div>
						<div class="d-block text-secondary about_user" style="overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--modal avatar-->
<div class="modal fade" id="avatar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content rounded-0">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Edit Avatar</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mt-3">
				<form class="edit_avatar">
					<div class="custom-file mb-3">
						<input type="hidden" class="hidden-avatar">
						<input type="file" class="custom-file-input change-avatar">
						<label class="custom-file-label bg-dark border-0 text-white d-block mx-auto avatar-name">Your Avatar</label>
					</div>
					<div class="form-group">
						<div class="card bg-secondary" style="height: 300px">
							<div class="card-body" align="center">
								<img src="" class="show-profile-image rounded" style="height: 100%">
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="text" placeholder="Write Your Bio" class="form-control d-block mx-auto bg-dark border-0 text-white  rounded-0 update-bio">
					</div>
					<button type="submit" class="btn btn-primary d-block ml-auto mt-5">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!--end avatar-->


<!--modal info-->
<div class="modal info fade close-modal" id="info" data-backdrop="static" tabindex="-2" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content rounded-0">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Your Info</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mt-3">
				<form action="" class="w-75 mx-auto form Update-info" id="">

					<div class="form-group">
						<input type="text" placeholder="Name" class="form-control w-75 d-block mx-auto bg-dark border-0 text-white  rounded-0 update_name">
					</div>

					<div class="form-group">
						<input type="email" placeholder="Email" class="form-control w-75 d-block mx-auto bg-dark border-0 text-white  rounded-0 update_email">
					</div>

					<div class="form-group">
						<?php 
						$negara = array(1 => 'Indonesia', 2 => 'Singapura', 3 => 'Brunei Darussalam', 4 => 'Thailand', 5 => 'Malaysia', 6 => 'Filipina', 7 =>  'Myanmar', 8 => 'Vietnam', 9 => 'Laos', 10 => 'Kamboja', 11 => 'Timor Leste'  ); 
						?>
						<select class="form-control w-75 d-block mx-auto bg-dark border-0 text-white  rounded-0 update_country">
								<option value="">Choose Your Country</option>
							<?php for ($i=1; $i <= 11; $i++) { ?>
								<option value="<?php echo $negara[$i]; ?>"><?php echo $negara[$i]; ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<input type="text" placeholder="City" class="form-control w-75 d-block mx-auto bg-dark border-0 text-white  rounded-0 update_city">
					</div>

					<div class="form-group">
						<input type="date" placeholder="Birth Date" class="form-control w-75 d-block mx-auto bg-dark border-0 text-white  rounded-0 update_birthdate">
					</div>

					<div class="form-group">
						<select name="" id="" class="form-control update_gender">
							<option value="1">Laki-laki</option>
							<option value="2">Perempuan</option>
						</select>
					</div>

					<button type="submit" class="btn btn-primary d-block ml-auto mt-5">Save</button>

				</form>
			</div>
		</div>
	</div>
</div>
<!--end modal info-->




<!--modal about-->
<div class="modal fade" id="about" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content rounded-0">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">About You</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mt-3">
				<form class="w-75 mx-auto form_update_about_me">
					<textarea cols="30" rows="6" class="form-control bg-dark text-white border-0 textarea_update_about_me" style="resize: none;"></textarea>
					<input type="hidden" class="id_super">
					<button type="submit" class="btn btn-primary d-block ml-auto mt-5">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!--end modal-->





<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?php echo base_url('assets/plugins/compress-image/jquery.exif.js'); ?>"></script>	
<script src="<?php echo base_url('assets/plugins/compress-image/jquery.canvasResize.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/compress-image/zepto.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/compress-image/binaryajax.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/compress-image/exif.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/compress-image/canvasResize.js'); ?>"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$(document).on('change', 'input.change-avatar', function(e) {
			file = e.target.files[0];
			$("label.avatar-name").html(file.name);
			canvasResize(file, {
				width: 400,
				height: 400,
				crop: true,
				quality: 100,
				callback: function(data) {
					$("input.hidden-avatar").val(data);
					$('img.show-profile-image').attr('src',data);
				}
			})
		})

		$(document).on('click', 'span.update-avatar', function() {
			bio = $(this).data('bio');
			$("input.update-bio").val(bio);
		});

		$(document).on('submit', 'form.edit_avatar', function() {
			avatar = $("input.hidden-avatar").val();
			bio = $("input.update-bio").val();

			$.ajax({
				url: "<?= base_url('api/Super_admin/Update_avatar'); ?>",
				type 	: "POST",
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>',
					avatar: avatar,
					bio: bio
				},
				success: function(req) {
					$("input.update-bio").val('');	
					$("input.hidden-avatar").val('');
					$("div#avatar").modal('hide');
					Read_avatar();
					Read_info();
				}
			})
			return false;
		})

		function Read_avatar(){
			$.ajax({
				url: '<?= base_url('api/Super_admin/Read_avatar'); ?>',
				type: 'POST',
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>',
				},
				success: function(req){
					$("img.avatar-admin").attr('src', "<?= base_url('api/img/Super_admin_profile/'); ?>"+req.data.image);
					$("div.user_bio").html(req.data.bio);
				}
			})
		}
		Read_avatar();


		function Read_info(){
			$.ajax({
				url: '<?= base_url('api/Super_admin/Read_info'); ?>',
				type: 'POST',
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success: function(req) {
					if (req.data.gender == 1) {
						gender = "laki-laki";
					}
					else{
						gender = "Perempuan";
					}
					$("td.name").html(req.data.full_name);
					$("td.email").html(req.data.email);
					$("td.country").html(req.data.country);
					$("td.city").html(req.data.city);
					$("td.birth_date").html(req.data.birth_date);
					$("td.gender").html(gender);
					$("div.update-avatar").html('\
						<span type="button" class="badge badge-primary update-avatar" data-toggle="modal" data-target="#avatar" data-bio="'+req.data.bio+'" style="cursor: pointer">\
							<i class="fa fa-edit"> Edit</i>\
						</span>');
					$("div.Update_info").html('\
						<span type="button" class="badge badge-primary update-info" data-toggle="modal" data-target="#info" data-name="'+req.data.full_name+'" data-email="'+req.data.email+'" data-country="'+req.data.country+'" data-city="'+req.data.city+'" data-birth_date="'+req.data.birth_date+'" data-gender="'+req.data.gender+'" style="cursor: pointer">\
							<i class="fa fa-edit"> Edit</i>\
						</span>');
					$("div.update_about_me").html('\
						<span type="button" class="badge badge-primary update-about-me" data-toggle="modal" data-target="#about" data-about_me="'+req.data.about_me+'" style="cursor: pointer">\
							<i class="fa fa-edit"> Edit</i>\
						</span>');
				} 
			})			
		}
		Read_info();

		$(document).on('click', 'span.update-info', function() {
			full_name = $(this).data('name');
			email = $(this).data('email');
			country = $(this).data('country');
			city = $(this).data('city');
			birth_date = $(this).data('birth_date');
			gender = $(this).data('gender');

			$("input.update_name").val(full_name);
			$("input.update_email").val(email);
			$("select.update_country").val(country);
			$("input.update_city").val(city);
			$("input.update_birthdate").val(birth_date);
			$("select.update_gender").val(gender);
		});

		$(document).on('submit', 'form.Update-info', function() {
			full_name = $("input.update_name").val();
			email = $("input.update_email").val();
			country = $("select.update_country").val();
			city = $("input.update_city").val();
			birth_date = $("input.update_birthdate").val();
			gender = $("select.update_gender").val();

			$.ajax({
				url: '<?= base_url('api/Super_admin/Update_info'); ?>',
				type: 'POST',
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>',
					full_name: full_name,
					email: email,
					country: country,
					city: city,
					birth_date: birth_date,
					gender: gender
				},
				success: function(req) {
					$("input.update_name").val('');
					$("input.update_email").val('');
					$("select.update_country").val('');
					$("input.update_city").val('');
					$("input.update_birthdate").val('');
					$("select.update_gender").val('');
					$("div#info").modal('hide');
					Read_info();
				}
			})
			return false;
		});




		function Read_about_me(){
			$.ajax({
				url: '<?php echo base_url('api/Super_admin/Read_info'); ?>',
				type: 'POST',
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success: function(req) {
					$("div.about_user").html(req.data.about_me);
				}
			})
		}
		Read_about_me();


		$(document).on('click', 'span.update-about-me', function() {
			about_me = $(this).data('about_me');
			$("textarea.textarea_update_about_me").val(about_me);
		});

		$(document).on('submit','form.form_update_about_me', function() {
			about_me = $("textarea.textarea_update_about_me").val();

			$.ajax({
				url: '<?= base_url('api/Super_admin/Update_about_me'); ?>',
				type: 'POST',
				data: {
					id: '<?php echo $this->session->userdata('user_id'); ?>',
					about_me: about_me
				},
				success: function(req) {
					$("textarea.textarea_update_about_me").val('');
					$("div#about").modal('hide');
					Read_about_me();
					Read_info();
				}
			})
			return false;
		});







	})
</script>