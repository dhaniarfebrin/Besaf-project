
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<h3>TOURNAMENT</h3>
	</div>

	<!-- END: Subheader -->
	<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Terlaris
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row mt-3">
				<?php
				for ($no=2; $no <= 4; $no++) {
				?>
				<div class="col-sm-4">
					<a href="<?php echo base_url('turnamen') ?>">
						<div class="m-portlet m-portlet--mobile">
							<img class="hover" src="<?php echo base_url('assets/app/media/img/products/product').$no.".jpg" ?>" alt="" style="width: 100%" class="rounded border">
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<select name="" class="form-control">
			<option value="">All</option>
			<option value="">Belum Tersedia</option>
		</select>
	</div>
	<div class="mt-3">
		<?php  
		for ($no=2; $no <= 9; $no++) { 
		?>
		<a href="<?php echo base_url('turnamen') ?>" style="text-decoration: none">
			<div class="m-portlet m-portlet--mobile hover">
				<div class="row">
					<div class="col-md-3">
						<div style="padding: 5%; margin-top: 2px">
							<img src="<?php echo base_url('assets/app/media/img/products/product').$no.".jpg" ?>" style="width: 100%" class="rounded border">
						</div>	
					</div>
					<div class="col-md-9">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										Product <?php echo ($no-1); ?>
									</h3>
								</div>
							</div>
						</div>
						<div class="m-portlet__body">
							<div class="row">
								<div class="col-sm-2">
									ENTRY
									<br><b>Free</b>
								</div>
								<div class="col-sm-2">
									SLOTS
									<br><b><?php echo ($no*2)."/32"; ?></b>
								</div>
								<div class="col-sm-2">
									TIME 
									<br><b><?php echo $tgl = date('Y-m-d'); ?></b>
								</div>
								<div class="col-sm-2">
									CLOSE IN 
									<br><?php echo date('Y-m-d',strtotime('+3 days',strtotime($tgl))) ?>
								</div>
								<div class="col-sm-3" align="right">
									Cookies
									<br><?php echo ($no*3)."00"; ?>
								</div>
									<i class="fa fa-cookie-bite text-warning" style="font-size: 30px"></i>
								<!-- </div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<?php } ?>
	</div>
</div>