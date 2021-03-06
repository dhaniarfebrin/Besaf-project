<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Access Forbidden</title>
	<link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.css">
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
	<style>
		.border-left {
			border-width: 4px !important;
        }
        
        .row {
            margin: 220px auto;
        }

        .btn-secondary:hover {
            background-color: rgb(44, 146, 203);
            color: black;
            border-color: rgb(44, 146, 203);
        }
	</style>
</head>

<body class="bg-dark">
	<div class="container-sm">
		<div class="row no-gutters mx-auto">
			<div class="px-4 col-5 float-right text-right">
				<img src="<?= base_url() ?>assets/Front/img/403.png" alt="" class="img-fluid" style="width: 200px">
			</div>
			<div class="col border-left border-light px-4">
				<div class="display-4 text-white font-weight-bold">
					403 Forbidden!
				</div>
				<div class="text-secondary">
					<h5>The page you are trying to access has restricted access.</h5>
                </div>
                <button type="button" class="btn btn-secondary rounded-pill shadow mt-3 font-weight-bold" onclick="goBack()">Go Back</button>
			</div>
		</div>
	</div>
	<script> 
		function goBack() {
			window.history.back();
		}
	</script>
</body>

</html>