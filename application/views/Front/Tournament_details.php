<a href="<?= base_url('auth/tournament') ?>">
    <img src="<?= base_url() ?>assets/Front/img/logo.png" alt="" class="mr-auto p-3" width="200px">
</a>
<div class="d-block shadow login-button" style="position: fixed; top: 16px; right: 24px;">
    <a href="<?= base_url('auth/login') ?>"><button class="btn btn-primary rounded font-weight-bold" type="button" data-toggle="login-tip" data-placement="left" title="login to get more"><span class="fa fa-lock"></span></button></a>
</div>

<div class="container text-white">
    <div class="col-md col-sm bg-dark shadow py-2">
        <!-- judul tournament -->
        <h4 class="m-0 text-wrap p-2 title-di-mobile-tournament-detail">CODM Pro Challenge Series x Boom Esports</h4>
        <!-- end judul tournament -->
    </div>
    <div class="row mt-3">
        <div class="col-md-4 mt-3">
            <div class="card bg-dark shadow">
                <!-- Gambar Tournament -->
                <div class="card-image">
                    <img src="http://res.cloudinary.com/yamisok/image/upload/h_400,f_auto/v1579580512/tournament/xbnkdevoxrx6tuul8wle.jpg" alt="" class="mw-100 img-fluid">
                </div>
                <!-- end Gambar Tournament -->

                <!-- Data tentang tournament -->
                <div class="card-body">
                    <div>
                        <h5 class="text-secondary text-md">Registration Open</h5>
                        <p class="text-sm">Until Fri, 7 Feb 2020 - 2:00 pm, GMT +7</p>
                    </div>
                    <div>
                        <h5 class="text-secondary text-md">Tournament Start</h5>
                        <p class="text-sm">Begin on Fri, 7 Feb 2020 - 3:00 pm, GMT +7</p>
                    </div>
                    <div>
                        <h5 class="text-secondary text-md">Joined Teams</h5>
                        <p class="text-lg">0/32</p>
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
                            <p class="hover">Yamisok</p>
                            <p class="hover">Yamisok</p>
                            <p class="text-secondary">Single Elimination</p>
                            <p class="text-secondary">Amount</p>
                            <p class="text-secondary">Online Tournament</p>
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
                        <p class="text-md m-0">Rp 1.000.000</p>
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
                <div class="card-body deskripsi-di-mobile">
                    <div>
                        <p class="text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores aperiam eaque odit quis sit repellendus suscipit ea repudiandae voluptatum, nobis, eius ipsa tempore, quaerat deserunt illo dicta commodi doloribus cum.</p>
                        <p class="text-wrap">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae mollitia et possimus ducimus aliquid a explicabo exercitationem qui rerum nisi atque nesciunt, aliquam laboriosam eum facilis! Quasi temporibus earum itaque?</p>
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
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, a dolores cupiditate voluptatem ex ipsam ipsa natus earum molestiae itaque sapiente quos rem corporis assumenda dolor veritatis corrupti odit temporibus?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, odio. Dolor quaerat voluptatibus consequatur iusto corrupti eos debitis dolore! Aut praesentium ex quidem architecto, cupiditate fugiat perspiciatis ipsa temporibus voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae fugit nostrum, soluta reprehenderit in quae magnam excepturi et obcaecati nulla. Odio, nisi veniam corrupti quisquam nulla velit aut in voluptatum?</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore culpa impedit necessitatibus voluptate vero dolorum ad reiciendis. Quo odit, porro minima saepe soluta quaerat commodi reprehenderit illum ducimus, illo earum.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos nesciunt sint delectus sapiente consequuntur similique aperiam quod at maiores? Magnam porro eligendi sit laudantium eos autem eius id tempora asperiores?</p>
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
            <div class="modal-body">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore culpa impedit necessitatibus voluptate vero dolorum ad reiciendis. Quo odit, porro minima saepe soluta quaerat commodi reprehenderit illum ducimus, illo earum.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos nesciunt sint delectus sapiente consequuntur similique aperiam quod at maiores? Magnam porro eligendi sit laudantium eos autem eius id tempora asperiores?</p>
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