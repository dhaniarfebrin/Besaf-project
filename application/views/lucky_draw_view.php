<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<h3>LUCKY DRAW</h3>
	</div>

	<!-- END: Subheader -->
	<div class="m-content">
		<div class="row">
			<div class="col-md-8">
				<div class="m-portlet m-portlet--mobile">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									DAPATKAN HADIAH
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="row">
							<?php 
							$hari = array(1 => 'Minggu', 2 => 'Senin', 3 => 'Selasa', 4 => 'Rabu', 5 => 'Kamis', 6 => 'Jumat', 7 => 'Sabtu');
							for ($no=1; $no <= 7; $no++) { 
							?>
							<div class="col-sm-4 mb-5">
								<div class="card" style="width: 100%">
								  <img class="card-img-top" src="<?php echo base_url('assets/app/media/img/products/product').$no.'.jpg'; ?>" alt="Card image cap">
								  <div class="card-body">
								  	<div align="center">
										<button class="btn disabled btn-info">
											<?php echo $hari[$no];; ?>
										</button>
										<hr>
										<?php echo "Product ".$no; ?>
									</div>
								  </div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="m-portlet m-portlet--mobile mb-5">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									KETERANGAN
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<p>1. Pemenang hadiah dilakukan secara acak.</p>
						<p>2. Pemenang diberi notifikasi berupa pesan email.</p>
						<p>3. Pemenang harus membalas pesan via email atau hadiah hangus.</p>
					</div>
					<a href="#" class="text-light text-center">
						<div class="m-portlet__footer btn btn-primary btn-flat btn-block">
								BERGABUNG
						</div>
					</a>
				</div>
				<div class="m-portlet m-portlet--mobile">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h6 class="m-portlet__head-text">
									HISTORY PEMENANG
								</h6>
							</div>
						</div>
					</div>
					<div class="m-portlet m-portlet--mobile">
						<table class="table table-condensed table-striped" style="padding: 3px">
							<thead>
								<tr class="bg-warning text-light">
									<th>DATE</th>
									<th>PEMENANG</th>
									<th>HADIAH</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($no=1; $no <= 3; $no++) { 
								?>
								<tr>
									<td><?php echo $hari[$no]; ?></td>
									<td><?php echo "Pemenang ".$no; ?></td>
									<td><?php echo "Product ".$no; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>