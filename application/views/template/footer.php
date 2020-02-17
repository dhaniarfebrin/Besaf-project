				</div>
				</div>
				<!-- begin::Footer -->
				<footer class="m-grid__item	m-footer " style="background: #262548;">
					<div class="m-container m-container--fluid m-container--full-height m-page__container">
						<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
							<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
								<span class="m-footer__copyright">
									2017 &copy; Metronic theme by
									<a href="https://keenthemes.com" class="m-link">Keenthemes</a>
								</span>
							</div>
							<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
								<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
									<li class="m-nav__item">
										<a href="<?= base_url(''); ?>#" class="m-nav__link">
											<span class="m-nav__link-text">About</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url(''); ?>#" class="m-nav__link">
											<span class="m-nav__link-text">Privacy</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url(''); ?>#" class="m-nav__link">
											<span class="m-nav__link-text">T&C</span>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="<?= base_url(''); ?>#" class="m-nav__link">
											<span class="m-nav__link-text">Purchase</span>
										</a>
									</li>
									<li class="m-nav__item m-nav__item--last">
										<a href="<?= base_url(''); ?>#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
											<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</footer>

				<div class="m-portlet m-portlet--mobile" style="position: fixed;top: 0; right: 0; width: 400px; margin-top: 100px; height: 550px; margin-right: 5px" id="notification">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<div class="row">
									<h3 class="m-portlet__head-text">
										Notification
									</h3>
								</div>
							</div>
						</div>
						<div class="m-portlet__tools">
							<button type="button" class="close notification mt-4">x</button>
						</div>
					</div>
					<div class="m-portlet__body p-0">
						<div class="m-scrollable data-notifikasi" data-scrollable="true" style="height: 370px">
							<!-- <div class="card p-2" style="max-width: 100%; height: 120px">
								<div class="row no-gutters">
									<div class="col-md-2">
										<img src="<?= base_url() ?>assets/img/profile.jpg" class="card-img rounded-circle" style="margin-top: 25%" alt="gambar">
									</div>
									<div class="col-md-10">
										<div class="card-body">
											<h5 class="card-title">Confirmation</h5>
											<p class="card-text">...........</p>
											<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card p-2" style="max-width: 100%; height: 120px">
								<div class="row no-gutters">
									<div class="col-md-2">
										<img src="<?= base_url() ?>assets/img/profile.jpg" class="card-img rounded-circle" style="margin-top: 25%" alt="gambar">
									</div>
									<div class="col-md-10">
										<div class="card-body">
											<h5 class="card-title">Invitation</h5>
											<p class="card-text">...........</p>
											<div class="row no-gutters">
												<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
												<div class="row no-gutters ml-auto mb-1">
													<style>
														.confirmation-btn-false:hover {
															background-color: red !important;
															cursor: pointer;
															color: white !important;
														}
														
														.confirmation-btn-true:hover {
															background-color: green !important;
															cursor: pointer;
															color: white !important;
														}
													</style>
													<button type="button" class="bg-transparent border-0 rounded-circle far fa-times-circle confirmation-btn-false" style="color: red"></button>
													<button type="button" class="bg-transparent border-0 rounded-circle far fa-check-circle confirmation-btn-true" style="color:green"></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>

				<div class="m-portlet m-portlet--mobile" style="position: fixed;top: 0; right: 0; width: 400px; margin-top: 100px; height: 550px; margin-right: 5px" id="update">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									Updates
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="m-scrollable" data-scrollable="true" style="height: 370px">
							<!-- Notification -->
						</div>
					</div>
				</div>

				<div class="m-portlet m-portlet--mobile" style="position: fixed;top: 0; right: 0; width: 400px; margin-top: 100px; height: 550px; margin-right: 5px" id="team">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									Team
								</h3>
							</div>
						</div>
						<div class="m-portlet__tools">
							<button type="button" class="close team mt-4">x</button>
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="m-scrollable" data-scrollable="true" style="height: 370px">
							<button class="btn btn-outline-info" data-toggle="modal" data-target="#create_team"><i class="fa fa-plus"></i> Create Team</button>
							<div class="mt-3">
								<table class="table table-hover my-team">

								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="m-portlet m-portlet--mobile" style="position: fixed;top: 0; right: 0; width: 100%; height: 100%; z-index: 9999; opacity: 0.9" id="loading">
					<div class="loading" align="center" style="margin-top: 15%">
						<img src="<?php echo base_url('assets/loading/loading.gif') ?>" style="width: 200px">
					</div>
				</div>


				<div class="modal fade" id="create_team">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">Create Team</h3>
							</div>
							<form class="create_team">
								<div class="modal-body">
									<div class="pesan-create-team"></div>
									<div class="form-group">
										<div class="custom-file shadow-sm">
											<input type="file" class="custom-file-input team-avatar">
											<label for="" class="custom-file-label team-avatar-name"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="card bg-secondary shadow-sm p-3" style="height: 200px" align="center">
											<img src="" class="team-avatar rounded" style="height: 100%">
											<input type="hidden" class="team-avatar-name">
										</div>
									</div>
									<div class="form-group">
										<select class="form-control team-game m-input m-input--air team-game">
											<option value="">Choose game</option>
											<option value="1">PES 2020</option>
										</select>
									</div>
									<div class="form-group">
										<input type="text" class="form-control m-input m-input--air m-input--pill team-name" placeholder="Team Name">
									</div>
									<div class="form-group">
										<input type="text" class="form-control m-input m-input--air m-input--pill team-tag" maxlength="6" placeholder="Team's Tag (Max: 6 Char)">
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-info btn-block btn-simpan-team" type="submit">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- end::Footer -->
				</div>
				<!-- begin::Scroll Top -->
				<div id="m_scroll_top" class="m-scroll-top">
					<i class="la la-arrow-up"></i>
				</div>

				<!--begin::Base Scripts -->
				<script src="<?= base_url(''); ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
				<script src="<?= base_url(''); ?>assets/demo/demo11/base/scripts.bundle.js" type="text/javascript"></script>

				<!--end::Base Scripts -->

				<!--begin::Page Vendors Scripts -->
				<script src="<?= base_url(''); ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

				<!--end::Page Vendors Scripts -->

				<!--begin::Page Snippets -->
				<script src="<?= base_url(''); ?>assets/app/js/dashboard.js" type="text/javascript"></script>

				<!-- dropzone -->
				<script src="<?php echo base_url('assets/demo/demo11/custom/crud/forms/widgets/dropzone.js'); ?>"></script>

				<!-- jQuery compress image -->
				<script src="<?php echo base_url('assets/plugins/compress-image/jquery.canvasResize.js'); ?>"></script>
				<script src="<?php echo base_url('assets/plugins/compress-image/jquery.exif.js'); ?>"></script>

				<!-- compress image -->
				<script src="<?php echo base_url('assets/plugins/compress-image/binaryajax.js'); ?>"></script>
				<script src="<?php echo base_url('assets/plugins/compress-image/canvasResize.js'); ?>"></script>
				<script src="<?php echo base_url('assets/plugins/compress-image/exif.js'); ?>"></script>
				<script src="<?php echo base_url('assets/plugins/compress-image/zepto.min.js'); ?>"></script>
				<script src="<?php echo base_url('assets/plugins/summernote/summernote.js') ?>"></script>

				<!--end::Page Snippets -->
				<script>
					// progress bar saat pindah halaman
					window.addEventListener("beforeunload", function(e) {
						document.body.className = "loading-halaman";
					}, false)
				</script>
				</body>

				<!-- end::Body -->

				</html>

				<script>
					function Coba() {
						$('div#loading').fadeOut(1000);
					}

					$(document).ready(function() {

						$('div#notification').hide();
						$(document).on('click', '.notification', function() {
							$('div#notification').slideToggle();
							$('div#update').fadeOut();
							$('div#team').fadeOut();
						})

						$('div#update').hide();
						$(document).on('click', '.update', function() {
							$('div#update').slideToggle();
							$('div#notification').fadeOut();
							$('div#team').fadeOut();
						})

						$('div#team').hide();
						$(document).on('click', '.team', function() {
							$('div#team').slideToggle();
							$('div#notification').fadeOut();
							$('div#update').fadeOut();
						})

					})
				</script>