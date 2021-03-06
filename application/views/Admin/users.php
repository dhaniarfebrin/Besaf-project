<div class="main">
	<div class="container mt-5">
		<h2 class="p-2">Users</h2>
		<!--table users-->
		<div class="">
			<div class="mx-auto mb-5">
				<div class="card w-25 mx-auto">
					<div class="card-header">
						<div class="card-title">Tambah admin</div>
					</div>
					<div class="card-body">
						<button class="btn btn-primary w-100" data-toggle="modal" data-target=""><i class="fa fa-plus"></i></button>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card w-auto mx-auto single-tab">
					<div class="card-body">
						<table id="user-table" class="w-auto mx-auto table table-dark text-white">
							<thead class="thead-primary">
								<tr>
									<th>#</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Status</th>
									<th>Detail</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--end table admin-->
		<!-- Modal confirm delete game -->

		<!-- end of Modal confirm delete game -->
		<!--modal add admin-->
		<!--     <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Admin</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-3">
                <form action="" class="w-75 mx-auto form">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-dark">@</span>
                        </div>
                        <input type="text" class="form-control bg-dark text-white border-0" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope  text-dark"></i></span>
                        </div>
                        <input type="email" class="form-control bg-dark text-white border-0" placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock text-dark"></i></span>
                        </div>
                        <input type="password" class="form-control bg-dark text-white border-0" placeholder="password">
                    </div>
                        <button type="button" class="btn btn-primary d-block ml-auto mt-5">Add</button>     
                </form>
            </div>
        </div>
    </div>
</div -->>
		<!-- modal add admin-->
	</div>
</div>
<div class="modal fade hapusen_ae_wes" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Game</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" class="delete-user">
				<p>Are you sure to delete user <b class="user-name"> </b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary delete">Delete</button>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>
<script>
	$(document).ready(function() {
		function Read_users() {
			$("table#user-table").DataTable().destroy();
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
							if (req.is_active == 1) {
								return "Aktif";
							} else {
								return "Belum aktif";
							}
						}
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
							return '<button type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#delete_user" data-id="' + req.id + '" data-name="' + req.full_name + '"><i class="fa fa-trash"></i></button>';
						}
					}
				]
			})
		}
		Read_users();
		$(document).on('click', 'button.hapus', function() {
			user_id = $(this).data('id');
			user_name = $(this).data('name');
			console.log(user_id)
			$('input.delete-user').val(user_id);
			$('b.user-name').html(user_name);
		});
		$(document).on('click', 'button.delete', function() {
			user_id = $('input.delete-user').val();
			$.ajax({
				url: '<?php echo base_url('api/Super_admin/Delete_user'); ?>',
				type: 'POST',
				data: {
					id: user_id
				},
				success: function(req) {
					console.log(req)
					$('input.delete-user').val('');
					$('div#delete_user').modal('hide');
					Read_users();
				}
			})
		});

	});
</script>