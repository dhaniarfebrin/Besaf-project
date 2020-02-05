<div class="main">
	<div class="container mt-5">
		<h2 class="p-3 te">Tournaments in Besaf</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">Request</div>
					<div class="card-body">
						<div class="card bg-secondary mb-2">
							<div class="row no-gutters">
								<div class="col-md-4">
									<div class="card-image">
										<img src="https://screenshotlayer.com/images/assets/placeholder.png" alt="images" class="img-thumbnail rounded-circle img" style="width: 60px;">
									</div>
								</div>
								<div class="col-md">
									<div class="card-body p-2">
										<p class="card-title my-auto font-weight-bold">Icafe Tournament</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card bg-secondary mb-2">
							<div class="row no-gutters">
								<div class="col-md-4">
									<div class="card-image">
										<img src="https://screenshotlayer.com/images/assets/placeholder.png" alt="images" class="img-thumbnail rounded-circle img" style="width: 60px;">
									</div>
								</div>
								<div class="col-md">
									<div class="card-body p-2">
										<p class="card-title my-auto font-weight-bold">MPL season 5</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card">
					<div class="card-header">
						Tournaments
					</div>
					<div class="card-body">
						<table class="table table-striped table-dark text-white table-hover" id="tournament" style="width: 100%">
							<thead class="thead-primary">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Game</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Mobile Legends Bang Bang Professional League</td>
									<td>Mobile Legends Bang Bang</td>
									<td><span class="badge badge-secondary">Upcoming</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
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
		function get_tournament() {
			$('table#tournament').DataTable({
				"processing" : true,
				"serverSide" : true,
				"deferRender" : true,
				"ajax" : {
					url : "<?php echo base_url('api/Tournament/show'); ?>",
					method : "POST",
					dataSrc : "data"
				},
				"columns" : [
					{
						data : null,
						render : function(data,type,row,meta) {
							return meta.row + meta.settings._iDisplayStart+1;
						}
					},
					{
						data : "tournament_nama"
					},
					{
						data : "game_nama"
					},
					{
						data : null,
						render : function(req) {
							var d = new Date();
							if (req.date_end >= '<?php echo date('Y-m-d') ?>') {
								status = '<span class="badge badge-dark">Upcoming</span>';
							} else {
								status = '<span class="badge badge-light">End</span>';
							}
							return status;
						}
					}
				]
			})
		}
		get_tournament();
	})
</script>