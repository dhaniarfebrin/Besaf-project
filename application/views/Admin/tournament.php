<div class="main">
	<div class="container mt-5">
		<h2 class="p-3 te">Tournaments in Besaf</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">Request</div>
					<div class="card-body">
						<a href="#" class="text-decoration-none text-white" data-toggle="modal" data-target="#requestModal">
							<div class="card bg-dark mb-2 shadow-none">
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
						</a>
						<a href="#" class="text-decoration-none text-white" data-toggle="modal" data-target="#requestModal">
							<div class="card bg-dark mb-2 shadow-none">
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
						</a>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card">
					<div class="card-header">
						Tournaments
					</div>
					<div class="card-body">
						<table class="table table-striped table-dark text-white table-hover" id="example">
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

<!-- modal request -->
<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content rounded-0">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Request</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
		</div>
	</div>
</div>

<!-- end modal request -->

<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>