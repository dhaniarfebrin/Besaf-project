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
	<nav class="navbar mainNavbar fixed">
		<div class="row p-2">
			<div class="col-md col">
				<div class="d-block">
					<button class="d-block bg-transparent border-0 ml-3 mt-1" onclick="openNav()">
						<h5 class="fas fa-stream mb-0"></h5>
					</button>
				</div>
			</div>
			<div class="col-md col">
				<div class="d-block">
					<h5 class="d-block text-center mb-0 mt-1">SUPER ADMIN</h5>
				</div>
			</div>
			<div class="col-md col">
				<div class="d-block pr-3 text-right">
					<div class="text-white mb-0 mt-1" id="watch"></div>
				</div>
			</div>
		</div>
	</nav>
	<!-- end navbar	-->