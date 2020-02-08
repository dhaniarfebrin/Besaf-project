<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<h3>DISCOVER</h3>
	</div>

	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Post & Video
					</h3>
				</div>
			</div>
		</div>
			<div class="m-portlet__body">
				<div class="row first_discover">
					<div class="col-sm-3 mb-5">
						<a href="#lihat" class="text-dark" data-toggle="modal" style="text-decoration: none">
							<div class="m-portlet m-portlet--mobile hover" style="width: 100%;">
							  	<img class="card-img-top" src="<?php echo base_url('assets/app/media/img/products/product7.jpg'); ?>" alt="Card image cap" class="hover">
							  	<div class="card-body">
							    	<p class="card-text">
							    		<strong>User <?php echo $no; ?></strong> <br>
							    		<small><?php echo ($no*4)." minutes ago"; ?></small>
							    	</p>
							  	</div>
							</div>
						</a>
					</div>
					<div class="col-sm-3 mb-5 collapse" id="more">
						<a href="#lihat" class="text-dark" data-toggle="modal" style="text-decoration: none">
							<div class="m-portlet m-portlet--mobile hover" style="width: 100%;">
							  	<img class="card-img-top" src="<?php echo base_url('assets/app/media/img/products/product7.jpg'); ?>" alt="Card image cap" class="hover">
							  	<div class="card-body">
							    	<p class="card-text">
							    		<strong>User <?php echo $no; ?></strong> <br>
							    		<small><?php echo ($no*4)." minutes ago"; ?></small>
							    	</p>
							  	</div>
							</div>
						</a>
					</div>
					<div class="col-md-12" align="center">
						<button class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#more">More</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="lihat_post">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-7">
						<img src="<?php echo base_url('assets/app/media/img/products/product7.jpg'); ?>" alt="" style="width: 100%" class="post-image">
					</div>
					<div class="col">
						<div class="card">
							<div class="row" style="padding: 5px">
								<div class="col-md-3">
									<img src="<?php echo base_url('assets/app/media/img/users/100_1.jpg'); ?>" class="rounded rounded-circle user-image" style="width: 50px">
								</div>
								<div class="col-md-7">
									<big><b class="user-name">Kacang</b></big><br>
									<small class="date">3 minutes ago</small>
								</div>
								<div class="col-md-2">
									<button class="close" data-dismiss="modal" type="button">x</button>
								</div>
								<div class="col-md-2 mt-4">
									<button class="btn btn-danger btn-sm" data-container="body" data-toggle="m-popover" data-content="Sukai" data-placement="bottom">
										<i class="la la-heart likes"></i>
									</button>
								</div>
								<div class="col-md-10 mt-4">
									<div class="input-group input-group-sm">
										<input type="text" class="form-control" placeholder="Tulis komentar...">
										<div class="input-group-append">
											<button type="button" class="btn btn-success">
												<i class="fa fa-paper-plane"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>