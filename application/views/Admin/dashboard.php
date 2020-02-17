		<!--			content-->
		<div class="main" id="main">
			<div class="container-sm mt-5">
				<div class="col-md">
					<h2 class="p-3">Dashboard</h2>
				</div>
				<div class="row">
					<div class="col-md col-xl mb-2">
						<a href="#" class="text-decoration-none text-white">
							<div class="card rounded border-left shadow py-2" style="border: 3px !important">
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
							<div class="card rounded border-left shadow py-2">
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
							<div class="card rounded border-left shadow py-2">
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
							<div class="card rounded border-left shadow py-2">
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

				<div class="row mt-5">
					<div class="col-5">
						<div class="card" data-offset="0" data-spy="scroll" style="max-height: 400px;">
							<div class="card-header font-weight-bold bg-primary">
								Request(s)
							</div>
							<div class="card-body bg-dark" style="overflow-y: scroll;">
								<? for ($i = 1; $i < 10; $i++) { ?>
									<div class="card shadow mb-2">
										<div class="row no-gutters">
											<div class="col-lg-3">
												<img src="<?= base_url() ?>assets/Admin/img/illustration.jpg" class="card-img h-100 w-100" alt="images">
											</div>
											<div class="col-lg">
												<div class="card-body">
													<div class="row">
														<div class="col">
															<p class="card-title mb-0">Someone</p>
															<p class="card-text text-muted">Komunitas</p>
														</div>
														<div class="col-4 px-1">
															<div class="row no-gutters float-right">
																<button type="button" class="d-block btn btn-sm btn-danger mr-1 rounded-circle">
																	<span class="fa fa-times p-1"></span>
																</button>
																<button type="button" class="d-block btn btn-sm btn-success rounded-circle">
																	<span class="fa fa-check"></span>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="card shadow mb-2">
										<div class="row no-gutters">
											<div class="col-lg-3">
												<img src="<?= base_url() ?>assets/Admin/img/illustration.jpg" class="card-img h-100 w-100" alt="images">
											</div>
											<div class="col-lg">
												<div class="card-body">
													<div class="row">
														<div class="col">
															<p class="card-title mb-0">Admin Komunitas</p>
															<p class="card-text text-muted">Tournament</p>
														</div>
														<div class="col-4 px-1">
															<div class="row no-gutters float-right">
																<button type="button" class="d-block btn btn-sm btn-danger mr-1 rounded-circle">
																	<span class="fa fa-times p-1"></span>
																</button>
																<button type="button" class="d-block btn btn-sm btn-success rounded-circle">
																	<span class="fa fa-check"></span>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<? } ?>
							</div>
						</div>
					</div>
					<div class="col position-relative">
						<div class="card bg-dark p-4">
							<h5 class="text-white font-weight-bold text-center mb-4">Chart</h5>
							<canvas id="myChart"></canvas>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!--			end content-->
		<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
		<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
		<script src="<?= base_url() ?>assets/Admin/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url() ?>assets/Admin/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?= base_url() ?>assets/Admin/js/chart.min.js"></script>
		<script>
			var ctx = document.getElementById('myChart');
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ['Users', 'Communities', 'Tournaments'],
					datasets: [{
						label: 'Data',
						data: [200, 90, 3],
						backgroundColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)'
						],
						borderWidth: 0
					}]
				},
				options: {
					cutoutPercentage: 60,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		</script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
		<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>