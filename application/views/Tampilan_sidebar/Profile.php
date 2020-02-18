<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator" style="font-family: arial black;">User Profile</h3>
			</div>
		</div>
	</div>

	<!-- END: Subheader -->
	<div class="m-content">
		<div class="notif mb-2"></div>
		<div class="card m-portlet m-portlet--mobile" style="width: 100%">
			<div class="row profile">

			</div>
			<div>
			</div>
		</div>
		<!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__body">
				<ul class="nav nav-pills nav-fill" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#Overview">Overview</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#Feeds">Feeds</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" data-toggle="tab" href="#m_tabs_3_4">Disabled</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="Overview" role="tabpanel">
						<div class="row">
							<div class="col-md-5">
								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--mobile m-portlet--body-progress- data-user" id="">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title" style="display: block;">
												<h3 class="m-portlet__head-text" style="font-family: arial black;">
													Player Info
												</h3>
											</div>
											<div>
												<button style="margin-left: 200px" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_profile" data-fullname=""><i class="flaticon-edit"> Edit</i></button>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<table class="table Info">

										</table>
									</div>
								</div>
								<!--end::Portlet-->
							</div>
							<div class="col-md-7">
								<!--begin::Portlet About me-->
								<div class="m-portlet m-portlet--mobile m-portlet--body-progress- about_me_div">

								</div>
								<!--end::Portlet-->

								<!--begin::Portlet About me-->
								<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text" style="font-family: arial black;">
													Skill and Role Endorsment
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<button style="margin-left: 200px;" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#skill_and_role"><i class="fa fa-plus-circle"> add</i></button>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="tampil_skill_role row" align="center"></div>
									</div>
								</div>
								<!--end::Portlet-->

								<!--begin::Portlet About me-->
								<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text" style="font-family: arial black;">
													Career Experience
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<button style="margin-left: 285px;" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#career_experience"><i class="fa fa-plus-circle"> add</i></button>
										</div>
									</div>
									<div class="m-portlet__body">
										<div class="row show_career">

										</div>
									</div>
								</div>
								<!--end::Portlet-->

								<!--begin::Portlet About me-->
								<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text" style="font-family: arial black;">
													Achievement
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<button style="margin-left: 285px;" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#achievement"><i class="fa fa-plus-circle"> add</i></button>
										</div>
									</div>
									<div class="m-portlet__body">
										<p align="center">No Data</p>
									</div>
								</div>
								<!--end::Portlet-->

							</div>
						</div>
					</div>
					<!-- Start of feeds -->
					<div class="tab-pane" id="Feeds">
						<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded" style="width: 50%; margin-left: 25%">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											User feeds
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="m-portlet m-portlet--head-sm mt-3" m-portlet="true" id="m_portlet_tools_5">
									<!--begin::Form-->
									<form>
										<div class="input-group">
											<input type="Textarea" img src="<?= base_url(); ?>assets/img/kamera.png" alt="" class="form-control" placeholder="Write your new post...">
											<div class="input-group-btn">
												<button style="padding: 60%; " class="btn btn-info btn-sm" type="submit">
													<i class="flaticon-paper-plane"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
	</div>
</div>
</div>
</div>


<!-- start modal add photo-->
<div class="modal fade photo" id="Add_photo">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Image Upload</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="height: 75%">
				<div class="muncul_notif6"></div>
				<div class="form-group m-form__group">
					<label class="">Upload Image</label>
					<form class="Add_photo">
						<div class="custom-file">
							<input type="file" class="custom-file-input user_image" id="customFile">
							<label class="custom-file-label user_image" for="customFile">Choose file</label>
							<input type="hidden" class="hidden_photo">
						</div>
				</div>
				<button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px">Done</button>
				<button type="reset" class="btn btn-secondary btn-sm" style="float: right;">Reset</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!--end::Modal-->



<!--begin::Modal settings-->
<div class="modal fade update_password" id="settings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Settings</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!--begin::Portlet-->
				<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									Social Media Connect
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="medsos"><a href="" class="connect-medsos"><i class="la la-facebook"> Facebook</i><span style="float: right">Connect</span></a></div>
						<div class="medsos"><a href="" class="connect-medsos"><i class="la la-google"> Google</i><span style="float: right">Connect</span></a></div>
						<div class="medsos"><a href="" class="connect-medsos"><i class="la la-instagram"> Instagram</i><span style="float: right">Connect</span></a></div>
						<div class="medsos"><a href="" class="connect-medsos"><i class="la la-twitter"> Twitter</i><span style="float: right">Connect</span></a></div>
						<div class="medsos"><a href="" class="connect-medsos"><i class="la la-steam"> Steam</i><span style="float: right">Connect</span></a></div>
					</div>
				</div>
				<!--end::Portlet-->

				<!--begin::Portlet-->
				<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									Change Password
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body" style="margin-bottom: 20px">
						<div class="muncul_notif1"></div>
						<!--begin::Form-->
						<form class="m-form m-form--fit m-form--label-align-right Change_password">
							<div class="form-group m-form__group">
								<input type="text" class="form-control m-input m-input--air m-input--pill current_password" placeholder="Your Current Password">
							</div>
							<div class="form-group m-form__group">
								<input type="Password" class="form-control m-input m-input--air m-input--pill new_password" placeholder="Your New Password">
							</div>
							<div class="form-group m-form__group">
								<input type="Password" class="form-control m-input m-input--air m-input--pill confirm_password" placeholder="Confirm Your New Password">
							</div>
							<div class="form-group m-form__group">
								<button type="submit" class="btn btn-sm btn-primary float-right" style="margin-left: 5px"> Change Password</button>
							</div>

						</form>
						<!--end::Form-->
					</div>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
	</div>
</div>
<!--end::Modal-->


<!-- start modal followers-->
<div class="modal fade" id="Followers">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Followers</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="height: 75%">
				<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="50">
					<p align="center">No Followers</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Modal-->


<!-- start modal following-->
<div class="modal fade" id="Following">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Following</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="50">
					<p align="center">Not Following Anyone</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Modal-->



<!-- start modal user profile -->
<div class="modal fade edit-profile" id="edit_profile">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="muncul_notif2"></div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right edit_profile">
					<div class="m-portlet__body">
						<input type="hidden" class="id">
						<div class="form-group m-form__group">
							<label for="">Realname</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill fullname" maxlength="25" placeholder="Enter Your Realname">
						</div>
						<div class="form-group m-form__group">
							<label for="">Country</label>
							<?php
							$negara = array(1 => 'Indonesia', 2 => 'Singapura', 3 => 'Brunei Darussalam', 4 => 'Tahiland', 5 => 'Malaysia', 6 => 'Filipina', 7 =>  'Myanmar', 8 => 'Vietnam', 9 => 'Laos', 10 => 'Kamboja', 11 => 'Timor Leste');
							?>
							<select class="form-control m-input m-input--air m-input--pill country">
								<option value="">Choose Your Country</option>
								<?php for ($i = 1; $i <= 11; $i++) { ?>
									<option value="<?php echo $negara[$i]; ?>"><?php echo $negara[$i]; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group m-form__group">
							<label for="">Date of Birth</label>
							<input class="form-control m-input--air m-input--pill birth_date" type="date" placeholder="Enter Your Birth Date">
						</div>
						<div class="form-group m-form__group">
							<label for="exampleSelect2">Gender</label>
							<select class="form-control m-input m-input--air m-input--pill gender" name="">
								<option value="">Choose Your Gender</option>
								<option value="1">Laki-Laki</option>
								<option value="2">Perempuan</option>
							</select>
						</div>
						<div class="form-group m-form__group">
							<label for="">City</label>
							<input type="text" class="form-control m-input--air m-input--pill city" placeholder="Enter Your City" maxlength="20">
						</div>
						<div class="form-group m-form__group">
							<label for="exampleTextarea">Adress</label>
							<textarea style="resize: none;" class="form-control m-input m-input--air m-input--pill adress" rows="3" placeholder="Enter Your Adress HERE" maxlength="32"></textarea>
						</div>
						<div class="form-group m-form__group">
							<label for="">Phone Number</label>
							<input type="text" class="form-control m-input--air m-input--pill phone_number" placeholder="Enter Your Phone Number" maxlength="20">
						</div>
						<div class="form-group m-form__group">
							<label for="">Email</label>
							<input type="Email" class="form-control m-input--air m-input--pill email" placeholder="Enter Your City" maxlength="50">
						</div>
					</div><br>
					<button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px">Done</button>
					<button type="reset" class="btn btn-secondary btn-sm" style="float: right;">Reset</button>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
</div>
<!-- end modal user profile -->


<!-- start modal about me -->
<div class="modal fade About_me_div" id="about_me">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Write Description About Yourself</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="muncul_notif3"></div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right About_me_form">
					<!-- <div class="form-group m-form__group"> -->
					<textarea style="resize: none; height: auto;" class="form-control m-input m-input--air m-input--pill About_me_text" rows="5" placeholder="Write About You Here....."></textarea>
					<!-- </div> --><br>
					<button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px">Done</button>
					<button type="reset" class="btn btn-secondary btn-sm" style="float: right;">Reset</button>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
</div>


<!-- start modal skill and role -->
<div class="modal fade" id="skill_and_role">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Game to Endorse</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="muncul_notif9"></div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right insert-skill-role">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label for="">Select Game</label>
							<select class="form-control m-input m-input--air m-input--pill select-game" id="skill-in-game">
							</select>
						</div>
						<div class="form-group m-form__group">
							<label for="exampleSelect2">Role in Game</label>
							<select class="form-control m-input m-input--air m-input--pill role-game" id="role-in-game">
							</select>
						</div>
						<div class="form-group m-form__group">
							<label class="">Upload Image</label>
							<form class="">
								<div class="custom-file">
									<input type="file" class="custom-file-input skill-image" id="customFile">
									<label class="custom-file-label label-career-image" for="customFile">Choose your image</label>
								</div>
								<input type="hidden" class="hidden-skill-image">
						</div>
						<div align="center" class="border rounded" style="height: 250px">
							<img class="show_image_skill" style="max-width: 100%; max-height: 100%; padding: 10px">
						</div>
					</div><br>
					<button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px">Done</button>
					<button type="reset" class="btn btn-secondary btn-sm" style="float: right;">Reset</button>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
</div>
<!-- end modal skill and role -->


<!-- start modal update skill and role -->
<div class="modal fade" id="skill_and_role_update">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Skill and Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="muncul_notif10"></div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right update-skill-role">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label for="">Select Game</label>
							<select class="form-control m-input m-input--air m-input--pill select-game-update" id="skill-in-game" disabled>
							</select>
						</div>
						<div class="form-group m-form__group">
							<label for="exampleSelect2">Role in Game</label>
							<select class="form-control m-input m-input--air m-input--pill role-game-upadate" id="role-in-game">
							</select>
						</div>
						<div class="form-group m-form__group">
							<label class="">Upload Image</label>
							<form class="">
								<div class="custom-file">
									<input type="file" class="custom-file-input skill-image-update" id="customFile">
									<label class="custom-file-label label-career-image-update" for="customFile">Choose your image</label>
								</div>
								<input type="hidden" class="hidden-skill-image-upadate">
						</div>
						<div align="center" class="border rounded" style="height: 250px">
							<img class="show_image_skill-update" style="max-width: 100%; max-height: 100%; padding: 10px">
						</div>
					</div><br>
					<div class="delete-and-update">

					</div>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
</div>
<!-- end modal update skill and role -->


<!-- start modal add career experience -->
<div class="modal fade Career" id="career_experience">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Your Career</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="muncul_notif5"></div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right Insert_career">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label for="">Career Type</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill Career_type" maxlength="150" placeholder="e.g Professional Players, Coach, Captain etc">
							<input type="hidden" class="hidden-delete-skill-role">
						</div>
						<div class="form-group m-form__group">
							<label for="">Team Name/In Game ID</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill Career_teamname_or_game_id" maxlength="150" placeholder="Your Team Name or Your Solo ID">
						</div>
						<div class="form-group m-form__group">
							<label for="">Add Game to Endorse</label>
							<select class="form-control m-input m-input--air m-input--pill Career_select_game">
								<option value="">Choose Your Game</option>
							</select>
						</div>
						<div class="form-group m-form__group">
							<label>Career Date</label>
							<div class="row">
								<div class="col-md-6">
									<select class="form-control Career_months">
										<option value="">Month</option>
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
								</div>
								<div class="col-md-6">
									<select class="form-control Career_years">
										<?php for ($i = 1990; $i <= date('Y'); $i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group">
							<label class="">Upload Image</label>
							<form class="">
								<div class="custom-file">
									<input type="file" class="custom-file-input Career_image" id="customFile">
									<label class="custom-file-label image_label" for="customFile">Choose file</label>
								</div>
								<input type="hidden" class="hidden_image">
						</div>
						<div align="center" class="border rounded" style="height: 250px">
							<img class="show_image" style="max-width: 100%; max-height: 100%; padding: 10px">
						</div>
					</div><br>
					<button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px">Done</button>
					<button type="reset" class="btn btn-secondary btn-sm" style="float: right;">Reset</button>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
</div>
<!-- end modal career experience -->


<!-- start modal update career experience-->
<div class="modal fade" id="Update_career">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Career</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="muncul_notif8"></div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right Update_career">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<input type="hidden" class="hidden-update-career">
							<input type="hidden" class="hidden-delete-career">
							<label for="">Career Type</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill career_type" maxlength="150" placeholder="e.g Professional Players, Coach, Captain etc">
						</div>
						<div class="form-group m-form__group">
							<label for="">Team Name/In Game ID</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill career_teamname_or_game_id" maxlength="150" placeholder="Your Team Name or Your Solo ID">
						</div>
						<div class="form-group m-form__group">
							<label for="">Add Game to Endorse</label>
							<select class="form-control m-input m-input--air m-input--pill career_select_game">
								<option value="" class=""></option>}
							</select>
						</div>
						<div class="form-group m-form__group">
							<label>Career Date</label>
							<div class="row">
								<div class="col-md-6">
									<select class="form-control career_months">
										<option value="">Month</option>
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
								</div>
								<div class="col-md-6">
									<select class="form-control career_years">
										<?php for ($i = 1990; $i <= date('Y'); $i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group">
							<label class="">Upload Image</label>
							<div class="custom-file">
								<input type="hidden" class="hidden-image-update">
								<input type="file" class="custom-file-input career-image-update" id="customFile">
								<label class="custom-file-label image-label-update" for="customFile">Choose file</label>
							</div>
						</div>
						<div align="center" class="border rounded" style="height: 250px">
							<img class="show-image-update" style="max-width: 100%; max-height: 100%; padding: 10px">
						</div>
					</div><br>
					<div class="delete-game">

					</div>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
</div>
<!-- end modal update career experience -->


<!-- start modal user achievement -->
<div class="modal fade" id="achievement">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Achievement</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right">
					<div class="m-portlet__body">
						<div class="form-group m-form__group">
							<label for="">Event Name</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill" maxlength="25" placeholder="e.g FREE FIRE FFWC, PBNC TOURNAMENT">
						</div>
						<div class="form-group m-form__group">
							<label for="">Role in Achievement</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill" maxlength="25" placeholder="e.g First Rank, As a Caster, Guest Star">
						</div>
						<div class="form-group m-form__group">
							<label for="">Select Game</label>
							<?php
							$game = array(1 => 'CSGO', 2 => 'PUBG MOBILE', 3 => 'PUBG', 4 => 'POINT BLANK', 5 => 'FREE FIRE', 6 => 'DOTA 2', 7 =>  'MOBILE LEGENDS BANG BANG');
							?>
							<select class="form-control m-input m-input--air m-input--pill">
								<option value="">Choose Your Game</option>
								<?php for ($i = 1; $i <= 7; $i++) { ?>
									<option value="<?php echo $negara[$i]; ?>"><?php echo $game[$i]; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group m-form__group">
							<label>Event Date</label>
							<div class="row">
								<div class="col-md-6">
									<select class="form-control">
										<option value="">Month</option>
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
								</div>
								<div class="col-md-6">
									<select class="form-control">
										<?php for ($i = 1990; $i <= date('Y'); $i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group">
							<label class="">Upload Image</label>
							<div class="custom-file">
								<input type="hidden" class="hidden-image-update">
								<input type="file" class="custom-file-input career-image-update" id="customFile">
								<label class="custom-file-label image-label-update" for="customFile">Choose file</label>
							</div>
						</div>
						<div align="center" class="border rounded" style="height: 250px">
							<img class="show-image-update" style="max-width: 100%; max-height: 100%; padding: 10px">
						</div>
					</div><br>
					<button type="submit" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px">Done</button>
					<button type="reset" class="btn btn-secondary btn-sm" style="float: right;">Reset</button>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
</div>
<!-- start modal user achievement -->