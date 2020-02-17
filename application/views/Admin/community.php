<div class="main" id="main">
	<div class="container-sm mt-5">
		<h2 class="p-2">Communities in Besaf</h2>
		<div class="row no-gutters" id="header">
			<div class="p-3">
				<button type="button" class="btn rounded-0 active" onclick="changeTab('com')">Communities</button>
			</div>
			<div class="p-3">
				<button type="button" class="btn rounded-0" onclick="changeTab('req')">Request(s)</button>
			</div>
		</div>
		<div class="card  rounded-0 shadow-none border-0">
			<div class="card-body">

				<!--			table komunitas-->
				<div id="com" class="single-tab d-flexbox">
					<table class="table table-striped table-borderless text-white table-hover table-dark" id="community" style="width: 100%">
						<thead class="thead-primary">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Game</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="4" align="center">Memuat....</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!--				end-->

				<!--				Request-->
				<div class="card bg-dark mb-2 single-tab shadow-none" id="req">
					<div class="row no-gutters">
						<div class="col-md-4">
							<div class="card-image">
								<img src="https://screenshotlayer.com/images/assets/placeholder.png" alt="images" class="img-thumbnail rounded-circle" style="width: 60px;">
							</div>
						</div>
						<div class="col-md">
							<div class="card-body p-2">
								<p class="card-title my-auto font-weight-bold">Komunitas</p>
							</div>
						</div>
					</div>
				</div>
				<!--				end-->

			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
<script>
	$(document).ready(function() {
		$('table#community').DataTable({
			"serverSide": true,
			"processing": true,
			"deferRender": true,
			"ajax": {
				url: "<?php echo base_url('api/Community/show'); ?>",
				method: "POST",
				dataSrc: "data"
			},
			"language": {
				"zeroRecordsFiltered": "belum"
			},
			"columns": [{
					data: null,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{
					data: "komunitas_nama"
				},
				{
					data: "game_nama"
				},
				{
					data: null,
					render: function(req) {
						return '\
						<a href="<?php echo base_url('Admin/community_details/') ?>' + req.komunitas_id + '" class="text-primary">Details</a>\
						'
					}
				}
			]
		})
	})
</script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>