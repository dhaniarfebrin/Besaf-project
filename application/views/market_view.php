<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
<div class="m-subheader ">
	<h3>MARKET</h3>
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
			<img src="<?php echo base_url('assets/app/media/img/banner.png'); ?>" width="100%">		
		</div>
	</div>
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__body">
			<div class="row mt-3">
				<div class="col-sm-4">
					<div class="m-portlet m-portlet--mobile card">
						<div class="row">
							<div class="col-sm-4">
								<img src="<?php echo base_url('assets/app/media/img/users/100_1.jpg') ?>" width="100%" alt="">
							</div>
							<div class="col">
								User 1
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5"></div>
				<div class="col-sm-3">
					<select name="" id="" class="form-control">
						<option value="">All</option>
						<option value="">Belum tersedia</option>
					</select>
				</div>
			</div>
			<div class="row">
				<?php  
				for ($no=1; $no <= 10; $no++) { 
				?>
				<div class="col-sm-3 mt-3">
					<a href="#" class="text-dark" style="text-decoration: none">
						<div class="m-portlet m-portlet--mobile hover">
							<img src="<?php echo base_url('assets/app/media/img/products/product').$no.'.jpg' ?>" alt="Hadiah" width="100%" class="card-img-top">
							<div class="card-body text-center">
								Product <?php echo $no; ?>
							</div>
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>