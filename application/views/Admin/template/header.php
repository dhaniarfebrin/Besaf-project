<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin | BESAF</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/Admin/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/Admin/css/all.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/Admin/css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
</head>

<body>

	<!-- Main Navbar -->
	<nav class="navbar mainNavbar fixed h-auto">
		
		<div class="row p-2 pr-4 mr-5">
			<div class="col-md col">
				<div class="d-block">
					<style>
						.button-open:hover {
							color: #0e52d3 !important;
						}

						.dropdown-button:hover {
							cursor: pointer;
							box-shadow: 2px 2px 20px #0e52d3;
						}
					</style>
					<button class="p-2 bg-transparent border-0 ml-5" onclick="openNav()">
						<h5 class="fas fa-stream mb-0 button-open"></h5>
					</button>
				</div>
			</div>
			<div class="col-md col">
				<div class="row ml-auto float-right">
					<span class="fa fa-comment mt-3 mr-3"></span>
					<span class="fa fa-envelope mt-3 mr-3"></span>
					<div class="text-center">
						<div class="dropdown">
							<img src="<?= base_url()  ?>assets/Admin/img/illustration.jpg" alt="" class="rounded-circle mt-1 dropdown-button" width="30px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<style>
								.dropdown-menu {
									transform: translate(-220px, 10px);
									width: 250px
								}

								.no-hover:hover {
									background-color: transparent;
								}
							</style>
							<div class="dropdown-menu  p-0 border-0" aria-labelledby="dropdownMenu2">
								<div class="dropdown-item rounded border-0 p-0">
									<a href="<?= base_url('Admin/profile') ?>" class="text-decoration-none">
										<div class="card bg-transparent shadow-none border-0 p-2">
											<div class="row no-gutters">
												<div class="col-md-4">
													<img src="<?= base_url()  ?>assets/Admin/img/illustration.jpg" class="card-img rounded-circle" alt="">
												</div>
												<div class="col-md-8">
													<div class="card-body">
														<p class="card-title mb-0"> <?= $this->session->userdata('username'); ?></p>
														<p class="card-text text-secondary	"><span class="badge badge-success"></span><small>Super Admin</small></p>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-item no-hover rounded float-right mt-3 pb-3">
									<div class="row no-gutters float-right">
										<a href="<?= base_url('admin/profile') ?>" class="text-decoration-none text-primary">
											<button class="d-block btn btn-sm btn-outline-primary rounded-circle"><span class="fa fa-cog"></span></a></button>
										<a href="<?= base_url('auth/logout') ?>" class="text-decoration-none text-danger ml-1">
											<button class="d-block btn btn-sm btn-outline-danger rounded-pill">Logout</a></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<!-- end navbar	-->