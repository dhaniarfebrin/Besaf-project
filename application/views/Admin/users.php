<div class="main">
	<div class="container mt-5">
		<h2 class="p-2">Users</h2>
		<!--table users-->
		<div class="">
			
			<div class="col-md">
				<div class="card w-auto mx-auto single-tab" id="user">
					<div class="card-body">
						<table id="user-table" class="w-auto mx-auto table table-dark text-white">
							<thead class="thead-primary">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Detail</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--end table user-->

		<!-- Modal confirm delete user -->
		<div class="modal fade hapusen_ae_wes mt-5" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
						<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<input type="hidden" class="delete-user">
						<p>Are you sure want to delete user <b class="user-name"> </b></p>
					</div>
					<div class="modal-footer border-0">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-danger delete">Delete</button>
					</div>
				</div>
			</div>
		</div>
		<!-- end of Modal confirm delete user -->

		
	</div>
</div>
<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>
<script>
	jQuery(document).ready(function() {
		function Read_users() {
			$("table#user-table").DataTable({
				"serverside": true,
				"processing": true,
				"deferRender": true,
				"ajax": {
					"url": "<?= base_url('api/Super_admin/Read_users'); ?>",
					"method": "POST",
					"dataSrc": "data"
				},
				"columns": [{
						data: null,
						render: function(data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1 + '.';
						}
					},
					{
						data: "full_name"
					},
					{
						data: "email"
					},
					{
						data: "role_name"
					},
					{
						data: null,
						render: function(req) {
							return '<a href="<?= base_url('Admin/user_details/') ?>' + req.id + '"">Details</a>';
						}
					},
					{
						data: null,
						render: function(req) {
							console.log(req);
							return '<button type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#deleteUser" data-id="' + req.id + '" data-name="' + req.full_name + '"><i class="fa fa-trash"></i></button>';
						}
					}
				]
			})
		}
		Read_users();
		$(document).on('click', 'button.hapus', function() {
			user_id = $(this).data('id');
			user_name = $(this).data('name');
			$('input.delete-user').val(user_id);
			$('b.user-name').html(user_name);
		});
		$(document).on('submit', 'button.delete', function() {
			user_id = $('input.delete-user').val();
			$.ajax({
				url: '<?= base_url('api/Super_admin/Delete_user'); ?>',
				type: 'POST',
				data: {
					id: user_id
				},
				success: function(req) {
					console.log(req.id);
					$('input.delete-user').val('');
					$('b.user-name').html('');
					$('div.hapusen_ae_wes').modal('hide');
					Read_users();
				}
			})
		});
	});
</script>