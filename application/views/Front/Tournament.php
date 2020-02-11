    <div class="d-block shadow login-button" style="position: fixed; top: 16px; right: 24px;">
        <a href="<?= base_url('auth/login') ?>"><button class="btn btn-primary rounded font-weight-bold" type="button" data-toggle="login-tip" data-placement="left" title="login to get more"><span class="fa fa-lock"></span></button></a>
    </div>

    <a href="<?= base_url() ?>">
        <img src="<?= base_url() ?>assets/Front/img/logo.png" alt="" class="mr-auto p-3" width="200px">
    </a>

    <div class="container bg-dark text-white pb-5 warna-transparan-di-mobile">
        <div class="row no-gutters ml-2 p-4">
            <h3 class="border-bottom border-light width-di-mobile-title">Tournament</h3>

            <!-- Search bar -->
            <form action="" method="post" class="ml-auto width-di-mobile-search">
                <div class="form-group shadow">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-secondary border-0">
                                <span class="fa fa-search text-white"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control bg-secondary border-secondary text-white border-bottom border-0">
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

                <!-- Tournament List Card -->
                <div class="col-md col-xl mt-3 tournament">
                    Data kosong....
                </div>

            </div>
        </div>

    </div>