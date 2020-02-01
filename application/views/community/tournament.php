<div class="row">
	<div class="col-md-9"></div>
	<div class="col-md-3">
		<select name="" class="form-control">
			<option value="">All</option>
			<option value="">Belum Tersedia</option>
		</select>
	</div>
	<div class="mt-3 community-turnamen" style="width: 100%">
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
								<div class="col-md-2">
									ENTRY
									<br><b>Free</b>
								</div>
								<div class="col-md-2">
									SLOTS
									<br><b><?php echo ($no*2)."/32"; ?></b>
								</div>
								<div class="col-md-2">
									TIME 
									<br><b><?php echo $tgl = date('Y-m-d'); ?></b>
								</div>
								<div class="col-md-2">
									CLOSE IN 
									<br><?php echo date('Y-m-d',strtotime('+3 days',strtotime($tgl))) ?>
								</div>
								<div class="col-md-3" align="right">
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