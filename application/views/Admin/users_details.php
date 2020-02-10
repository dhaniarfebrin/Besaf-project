<div class="main">
	<div class="container mt-5">
		<h2>Users Details</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="card-image">
							<div class="pt-3 image-thumbnail">
								<img src="https://esportsnesia.com/wp-content/uploads/2018/06/evos-esports.jpg" alt="" style="width: 125px" class="img">
							</div>
						</div>
						<div class="mt-3 text-center">
							<h5 class="card-title text-center font-weight-bold username">

							</h5>
							<div class="card-text text-secondary role_name">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<h5 class="p-2">info</h5>
						<hr>
						<div class="container mt-1">
							<table class="table table-borderless text-white mx-auto">
								<tbody>
									<tr>
										<th>Name</th>
										<td class="text-secondary full-name"></td>
									</tr>
									<tr>
										<th>Email</th>
										<td class="text-secondary email"></td>
									</tr>
									<tr>
										<th>Country</th>
										<td class="text-secondary country"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-4">
				
			</div>
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<h5 class="p-2">About</h5>
						<hr>
						<div class="container mt-3" style="overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">
							<p class="text-secondary about-me">
								
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>
<script>
	$(document).ready(function($) {
		function Users_detail() {
			$.ajax({
				url: '<?php echo base_url('api/Super_admin/Users_detail'); ?>',
				type: 'POST',
				data: {
					user_id: '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success: function(req) {
					console.log(req);
					$("h5.username").html(req.data.username);
					$("div.role_name").html(req.data.role_name);
					$("td.full-name").html(req.data.full_name);
					$("td.email").html(req.data.email);
					$("td.country").html(req.data.country);
					$("p.about-me").html(req.data.about_me);
				}
			})
		}
		Users_detail();



	});
</script>