<div class="row member">
	<?php  
	for ($member=1; $member <= 10; $member++) { 
	?>
	<div class="col-sm-4">
		<a href="#" style="text-decoration: none;" class="text-dark">
			<div class="m-portlet m-portlet--mobile card hover">
				<div style="padding: 5px">
					<div class="row">
						<div class="col-sm-4">
							<img src="<?php echo base_url('assets/app/media/img/users/100_'.$member.'.jpg') ?>" alt="Users" class="rounded rounded-circle" style="max-width: 100%">
						</div>
						<div class="col-sm-4" style="margin-top: 5px">
							<h5>User <?php echo $member; ?></h5>
						</div>
						<div class="col-sm-4" align="right">
							<button class="btn btn-info mt-5" >follow</button>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<?php } ?>
</div>