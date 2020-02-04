<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BESAF</title>    
	<link rel="stylesheet" href="<?= base_url() ?>assets/Front/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/Front/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/Front/css/Style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>

<div class="d-block shadow" style="position: fixed; top: 16px; right: 24px;">
    <a href="<?=base_url('auth/login') ?>"><button class="btn btn-primary rounded font-weight-bold" type="button" data-toggle="login-tip" data-placement="left" title="login to get more"><span class="fa fa-lock"></span></button></a>
</div>

<img src="<?= base_url() ?>assets/Front/img/logo.png" alt="" class="mr-auto p-3" width="200px">

<div class="container bg-dark text-white pb-5">
    <div class="row no-gutters ml-2 p-4">
        <h3 class="border-bottom border-light">Tournament</h3>

        <!-- Search bar -->
        <form action="" method="post" class="ml-auto">
            <div class="form-group shadow">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-secondary border-0">
                            <span class="fa fa-search text-white"></span>
                        </div>
                    </div>
                    <input type="text" name="" id="" placeholder="" class="form-control bg-secondary border-secondary text-white border-bottom border-0">
                </div>
            </div>
        </form>
        <!--  ENd Search bar -->

    </div>
    <div class="col-md col-xl">

        <!-- Iklan jumbotron -->
        <div class="jumbotron jumbotron-fluid shadow rounded bg-dark p-0">
            <img src="https://res.cloudinary.com/yamisok/image/upload/v1580096954/banner/z7doal3qswsqmamsg8gj.png" alt="" class="w-100 rounded">
        </div>
        <!-- end Iklan jumbotron -->

        <div class="col-md col-xl mt-5">
            <?php for ($i = 1; $i <= 3; $i++) { ?>

                <!-- Tournament List Card -->
                <a href="<?= base_url('auth/tournament_details') ?>" class="text-decoration-none">
                    <div class="col-md col-xl mt-3">
                        <div class="card bg-dark shadow rounded text-white">
                            <div class="row no-gutters">

                                <!-- Image Tournament -->
                                <div class="col-md-4 col-xl-3">
                                    <img src="http://res.cloudinary.com/yamisok/image/upload/h_400,f_auto/v1579580512/tournament/xbnkdevoxrx6tuul8wle.jpg" alt="" class="w-100 h-100 rounded-left">
                                </div>
                                <!-- end Image Tournament -->

                                <div class="col-md col-xl">
                                    <div class="card-body">
                                        <div class="row no-gutters d-iniline-block border-bottom border-secondary">

                                            <!-- title tournament -->
                                            <h5 class="card-title">CODM Pro Challenge Series x Boom Esports</h5>
                                            <!-- end title tournament -->

                                            <!-- status -->
                                            <div class="ml-auto">
                                                <span class="badge badge-secondary">Upcoming</span>
                                            </div>
                                            <!-- end status -->

                                        </div>
                                        <div class="p-0 m-0">
                                            <div class="row no-gutters pt-3">

                                                <!-- list -->
                                                <div class="col-md col-sm">
                                                    <h5 class="text-secondary">Prize</h5>
                                                    <p>1000000</p>
                                                </div>
                                                <div class="col-md col-sm">
                                                    <h5 class="text-secondary">Slots</h5>
                                                    <p>8/16</p>
                                                </div>
                                                <div class="col-md col-sm">
                                                    <h5 class="text-secondary">Date</h5>
                                                    <p>09 Feb</p>
                                                </div>
                                                <div class="col-md col-sm">
                                                    <h5 class="text-secondary">Time</h5>
                                                    <p>14:00 WIB</p>
                                                </div>
                                                <!-- end list -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- end Tournament List Card -->

            <?php } ?>

        </div>
    </div>

</div>