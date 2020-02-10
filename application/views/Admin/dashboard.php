		<!--			content-->
		<div class="main" id="main">
			<div class="container mt-5">
				<div class="col-md">
					<h2 class="p-3">Dashboard</h2>
				</div>
				<div class="row">
					<div class="col-md col-xl mb-2">
						<a href="#" class="text-decoration-none text-white">
							<div class="card rounded border-left-primary shadow py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary mb-1">
												Communities
											</div>
											<div class="h5 mb-0 font-weight-bold">9929</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-table fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md col-xl mb-2">
						<a href="#" class="text-decoration-none text-white">
							<div class="card rounded border-left-primary shadow py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary mb-1">
												Pending Requests
											</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-comments fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md col-xl mb-2">
						<a href="" class="text-decoration-none text-white">
							<div class="card rounded border-left-primary shadow py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary mb-1">
												Users
											</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">9941229</div>
										</div>
										<div class="col-auto">
											<i class="fa fa-user fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md col-xl mb-2">
						<a href="" class="text-decoration-none text-white">
							<div class="card rounded border-left-primary shadow py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary mb-1">
												Teams
											</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">1093</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-user-friends fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<!-- chart -->
				<div class="col-md col-sm col col-xl">
					<div class="card rounded shadow mt-5">
						<canvas id="chart"></canvas>
					</div>
				</div>
				<!-- end chart -->
			</div>
		</div>

		<!--			end content-->
		<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
		<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>