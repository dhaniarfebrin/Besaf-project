<div class="main">
	<div class="container mt-5">
		<h2 class="p-2">Teams</h2>
		<div class="card">
			<div class="card-body">
				<table class="table table-striped table-borderless text-white table-dark data-team" style="width: 100%">
					<thead class="thead-primary">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Tag</th>
							<th>Game</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>
<script>
	$(document).ready(function() {
		
		function show() {
			$('table.data-team').DataTable({
				"deferRender" : true,
				"processing" : true,
				"serverSide" : true,
				"ajax" : {
					url : "<?php echo base_url('api/Admin_team/show') ?>",
					method : "POST",
					dataSrc : "data"
				},
				"columns" : [
					{
						data : null,
						render : function(data,type,row,meta) {
							return meta.row + meta.settings._iDisplayStart + 1;
						}
					},
					{
						data : null,
						render : function(req) {
							return '\
								<img src="<?php echo base_url('api/img/team/') ?>'+req.gambar+'" style="width: 50px" class="rounded rounded-circle">\
								<span>'+req.nama+'</span>\
							';
						}
					},
					{
						data : "alias"
					},
					{
						data : "game_nama"
					},
					{
						data : null,
						render : function(req) {
							return '<a href="<?php echo base_url('Admin/team_details/') ?>'+req.id+'">Details</a>';
						}
					}
				]
			})
		}

		show();

	})
</script>