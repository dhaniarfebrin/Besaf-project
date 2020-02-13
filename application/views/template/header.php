<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>Besaf | Dashboard</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->

	<!--begin::Page Vendors Styles -->
	<link href="<?= base_url(''); ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?= base_url(''); ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Page Vendors Styles -->

	<!--begin::Base Styles -->
	<link href="<?= base_url(''); ?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?= base_url(''); ?>assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="<?= base_url(''); ?>assets/demo/demo11/base/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?= base_url(''); ?>assets/demo/demo11/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?= base_url(''); ?>assets/img/besaf.png" />
	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
		ga('create', 'UA-37564768-1', 'auto');
		ga('send', 'pageview');
	</script>
	<link rel="stylesheet" href="<?php echo base_url('assets/app/css/app.css'); ?>">
	<style>
		.loading-halaman::before {
			content: "";
			display: block;
			position: fixed;
			z-index: 99;
			height: 3px;
			width: 100%;
			top: 0;
			left: 0;
			background-color: white;
			animation: load-halaman infinite ease-out 2s;
		}

		@keyframes load-halaman {
			from {
				background-color: #2C92CB;
			}

			to {
				background-color: orange;
			}
		}
	</style>
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body onload="Coba()" class="m-content--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside--offcanvas-default" style="background: url('<?php echo base_url('assets/img/bg.jpg') ?>'); background-size: 100%;">

	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

		<!-- BEGIN: Header -->
		<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">

					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-light ">
						<div class="m-stack m-stack--ver m-stack--general m-stack--fluid">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a href="<?= base_url('user'); ?>" class="m-brand__logo-wrapper">
									<img alt="" style="width: 103px" src="<?= base_url(); ?>assets/img/besaf.png" />
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">
								<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="click" aria-expanded="true">
								</div>

								<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>

								<!-- END -->

								<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i>
								</a>

								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>

					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

						<!-- BEGIN: Topbar -->
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">
									<li class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
									</li>
									<li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
										<a href="#" class="m-nav__link m-dropdown__toggle">
											<span class="m-topbar__userpic">
												<img src="<?php echo base_url('assets/app/media/img/users/100_1.jpg'); ?>" class="m--img-rounded m--marginless m--img-centered" alt="" />
											</span>
											<span class="m-nav__link-icon m-topbar__usericon  m--hide">
												<span class="m-nav__link-icon-wrapper">
													<i class="flaticon-user-ok"></i>
												</span>
											</span>
											<span class="m-topbar__username m--hide">Nick</span>
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__header m--align-center">
													<div class="m-card-user m-card-user--skin-light">
														<div class="m-card-user__pic">
															<img src="<?php echo base_url(''); ?>assets/app/media/img/users/100_1.jpg" class="m--img-rounded m--marginless" alt="" />
														</div>
														<div class="m-card-user__details">
															<span class="m-card-user__name m--font-weight-500">Makhluk Bumi</span>
															<a href="" class="m-card-user__email m--font-weight-300 m-link">ini.mek.contoh@gmail.com</a>
														</div>
													</div>
												</div>
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav m-nav--skin-light">
															<li class="m-nav__section m--hide">
																<span class="m-nav__section-text">Section</span>
															</li>
															<li class="m-nav__item">
																<a href="<?= base_url('user/profile') ?>" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-profile-1"></i>
																	<span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">My Profile</span>
																			<span class="m-nav__link-badge">
																				<span class="m-badge m-badge--success">2</span>
																			</span>
																		</span>
																	</span>
																</a>
															</li>
															<li class="m-nav__separator m-nav__separator--fit">
															</li>
															<li class="m-nav__item">
																<a href="<?= base_url('auth/logout') ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<!-- END: Topbar -->
					</div>
				</div>
			</div>
		</header>

		<!-- END: Header -->