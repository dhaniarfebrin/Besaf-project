<!-- Sidebar -->

<div class="sidebar" id="sidebar" style="overflow: hidden">
    <div class="row no-gutters">
        <div class="col">
            <div class="p-3">
                Super<span class="font-weight-bold">Admin</span>
            </div>
        </div>
        <div class="col">
            <div class="icon-close p-2 ml-auto">    
                <button class="btn btn-secondary bg-transparent border-0" onclick="closeNav()">
                    <h5 class="fa fa-times mb-0 my-auto"></h5>
                </button>
            </div>
        </div>
    </div>
    <a href="<?= base_url('Admin/profile') ?>">
        <div class="akun mt-0 mb-3 row text-white">
            <div class="avatar my-auto col">
                <img src="<?= base_url()  ?>assets/Admin/img/illustration.jpg" alt="" class="img">
            </div>
            <div class="username my-auto col">
                <p class="mx-auto text-center mb-0">
                    <?= $this->session->userdata('username'); ?>
                </p>
            </div>
        </div>
    </a>
    <nav class="mt-2">
        <ul class="subnav">
            <li class="nav-item">
                <a href="<?= base_url('Admin/dashboard') ?>" class="nav-link <?php if (uri_string() == 'Admin/dashboard') {
                                                                                    echo "link-active";
                                                                                } ?>"><span class="fa fa-tachometer-alt mr-3"></span>Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/tournament') ?>" class="nav-link <?php if (uri_string() == 'Admin/tournament') {
                                                                                    echo "link-active";
                                                                                } ?>"><span class="fas fa-trophy mr-3"></span>Tournaments</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/game') ?>" class="nav-link <?php if (uri_string() == 'Admin/game') {
                                                                            echo "link-active";
                                                                        } ?>"><span class="fa fa-gamepad mr-3"></span>Games</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/community') ?>" class="nav-link <?php if (uri_string() == 'Admin/community') {
                                                                                    echo "link-active";
                                                                                } ?>"><span class="fa fa-users mr-3"></span>Communities</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/team') ?>" class="nav-link <?php if (uri_string() == 'Admin/team') {
                                                                            echo "link-active";
                                                                        } ?>"><span class="fa fa-user-friends mr-3"></span>Teams</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/user') ?>" class="nav-link <?php if (uri_string() == 'Admin/user') {
                                                                            echo "link-active";
                                                                        } ?>"><span class="fa fa-user mr-3"></span>Users</a>
            </li>
            <li class="nav-item mt-5">
                <a href="<?= base_url('auth/logout') ?>" class="nav-link">Logout <span class="fa fa-sign-out-alt ml-2"></span></a>
            </li>
        </ul>
    </nav>
</div>
<!--	end sidebar		-->
</div>