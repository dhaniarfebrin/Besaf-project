<a href="<?= base_url('auth/tournament') ?>">
    <img src="<?= base_url() ?>assets/Front/img/logo.png" alt="" class="mr-auto p-3" width="200px">
</a>
<div class="d-block shadow login-button" style="position: fixed; top: 16px; right: 24px;">
    <a href="<?= base_url('auth/login') ?>"><button class="btn btn-primary rounded font-weight-bold" type="button" data-toggle="login-tip" data-placement="left" title="login to get more"><span class="fa fa-lock"></span></button></a>
</div>

<div class="container text-white">
    <div class="col-md col-sm bg-dark shadow py-2">
        <!-- judul tournament -->
        <h4 class="m-0 text-wrap p-2 title-di-mobile-tournament-detail nama">-</h4>
        <!-- end judul tournament -->
    </div>
    <div class="row mt-3">
        <div class="col-md-4 mt-3">
            <div class="card bg-dark shadow">
                <!-- Gambar Tournament -->
                <div class="card-image p-3" align="center">
                    <img src="" alt="" class="mw-100 img-fluid turnamen_image">
                </div>
                <!-- end Gambar Tournament -->

                <!-- Data tentang tournament -->
                <div class="card-body">
                    <div>
                        <h5 class="text-secondary text-md">Registration Open</h5>
                        <p class="text-sm date_start">-</p>
                    </div>
                    <div>
                        <h5 class="text-secondary text-md">Tournament Start</h5>
                        <p class="text-sm date_start">-</p>
                    </div>
                    <div>
                        <h5 class="text-secondary text-md">Joined Teams</h5>
                        <p class="text-lg slots"></p>
                    </div>
                    <a href="#" class="font-italic text-white" data-toggle="modal" data-target="#how_to_join">how to join</a> |
                    <a href="#" class="font-italic text-white" data-toggle="modal" data-target="#view_rules">view rules</a>
                </div>
                <!-- end data tentang tournament -->
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card bg-dark shadow">
                <div class="card-header bg-secondary font-weight-bold">
                    Tournament Details
                </div>
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col text-sm font-weight-bold">
                            <p>Hosted by</p>
                            <p>Community</p>
                            <p>Tournament Mode</p>
                            <p>Prize type</p>
                            <p>Venue</p>
                        </div>
                        <!-- Tournament Details -->
                        <div class="col text-sm">
                            <p class="hover host">-</p>
                            <p class="hover host">-</p>
                            <p class="text-secondary mode">-</p>
                            <p class="text-secondary">-</p>
                            <p class="text-secondary venue">-</p>
                        </div>
                        <!-- End tounament details -->
                    </div>
                </div>
            </div>
            <div class="card bg-dark shadow mt-3">
                <div class="card-header bg-secondary font-weight-bold">
                    Prize Pool
                </div>
                <div class="card-body">
                    <div class="row no-gutters">
                        <!-- Prize total -->
                        <p class="text-md m-0 hadiah">Rp -</p>
                        <!-- end prize total -->
                        <a href="#" class="text-sm ml-auto text-white font-italic" data-toggle="modal" data-target="#prizes">view all prizes</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <!-- Deskripsi -->
            <div class="card bg-dark shadow">
                <div class="card-header bg-secondary font-weight-bold">
                    Description
                </div>
                <div class="card-body deskripsi-di-mobile deskripsi">
                    <div>
                        -
                    </div>
                </div>
            </div>
            <!-- End deskripsi -->
        </div>
    </div>
</div>

<!-- Modal view rules -->
<div class="modal fade" id="view_rules" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-dark">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Rules</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body rules">
               -
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- modal how to join -->
<div class="modal fade" id="how_to_join" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-dark">
                <h5 class="modal-title" id="exampleModalScrollableTitle">How to Join</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body to_join">
                -
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- modal prizes -->
<div class="modal fade" id="prizes" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-dark">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Rules</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless text-white">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Prize</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1.000.000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2.000.000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>3.000.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end modal prizes -->