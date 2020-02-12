<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

	<!-- BEGIN: Left Aside -->
	<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
		<i class="la la-close"></i>
	</button>
	<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">

		<!-- BEGIN: Aside Menu -->
		<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
			<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
				<li class="m-menu__section m-menu__section--first">
					<h4 class="m-menu__section-text">Home</h4>
					<i class="m-menu__section-icon flaticon-more-v2"></i>
				</li>
				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
					<a href="<?= base_url('user'); ?>" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-layers"></i>
						<span class="m-menu__link-text">Dashboard</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="" data-toggle="modal" data-target="#game" class="m-menu__link ">
						<i class="m-menu__link-icon fa fa-gamepad"></i>
						<span class="m-menu__link-text">Game Profil</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="<?= base_url('user/community'); ?>" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-users"></i>
						<span class="m-menu__link-text">Communities</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="<?= base_url('user/tournament'); ?>" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-trophy"></i>
						<span class="m-menu__link-text">Tournament</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="<?= base_url('user/discover'); ?>" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-infinity"></i>
						<span class="m-menu__link-text">Discover</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="<?= base_url('user/lucky_draw'); ?>" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-time"></i>
						<span class="m-menu__link-text">Lucky Draw</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="<?= base_url('user/market'); ?>" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-bag"></i>
						<span class="m-menu__link-text">Market</span>
					</a>
				</li>
				<li class="m-menu__section ">
					<h4 class="m-menu__section-text">Lainnya</h4>
					<i class="m-menu__section-icon flaticon-more-v2"></i>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="<?= base_url('user/profile'); ?>" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-user"></i>
						<span class="m-menu__link-text">Profile</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="#notification" class="m-menu__link notification">
						<i class="m-menu__link-icon flaticon-bell"></i>
						<span class="m-menu__link-text">Notification</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="#updates" class="m-menu__link update">
						<i class="m-menu__link-icon flaticon-edit"></i>
						<span class="m-menu__link-text">Updates</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a class="m-menu__link team">
						<i class="m-menu__link-icon flaticon-network"></i>
						<span class="m-menu__link-text">Team</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="<?= base_url('user/faq'); ?>" class="m-menu__link ">
						<i class="m-menu__link-icon flaticon-info"></i>
						<span class="m-menu__link-text">FAQ</span>
					</a>
				</li>
				<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
					<a href="<?= base_url('auth/logout'); ?>" class="m-menu__link ">
						<i class="m-menu__link-icon fa fa-door-open"></i>
						<span class="m-menu__link-text">Logout</span>
					</a>
				</li>
			</ul>
		</div>

		<!-- END: Aside Menu -->
	</div>

	<div class="modal fade" id="game">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3>CONNECT YOUR GAME ID</h3>
					<button class="close" data-dismiss="modal" type="button">x</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div id="demo" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="row">
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product1.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product2.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product3.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="row">
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product4.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product5.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product6.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
									</div>
								</div>
								<div class="carousel-item">
									<div class="row">
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product7.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product8.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
										<div class="col-md-4"><a href="#"><img class="border hover" src="<?php echo base_url('assets/app/media/img/products/product9.jpg'); ?>" style="padding: 3px; width: 100%"></a></div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="demo active border"></li>
								<li data-target="#demo" data-slide-to="1" class="demo border"></li>
								<li data-target="#demo" data-slide-to="2" class="demo border"></li>
							</ul>
							<hr>
						</div>
						<style>
							li.demo {
								padding: 5px;
							}

							li.demo.active {
								background: #0066FF;
							}
						</style>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control">
							</div>
							<button class="btn btn-info">Connect</button>
						</div>
						<div class="col-md-6">
							<h5>Important Notice</h5>
							<p>You currently are not participant in any tournament.</p>
							<p>You currently are not participant in any challenge</p>
							<p>Warning: If you put different Nickname and Game ID from the game, you have a chance to be disqualified from competition.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>