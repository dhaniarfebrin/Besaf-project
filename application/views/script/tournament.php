<script>
	$(document).ready(function() {
		function show() {
			jadwal = $('select.jadwal').val();
			$.ajax({
				url : "<?php echo base_url('api/Turnamen/show') ?>",
				method : "POST",
				async : true,
				success : function (req) {
					html = '';
					if (req.error==true) {
						html += '\
						<div class="m-portlet m-portlet--mobile">\
							<div class="m-portlet__body">\
								<h5 class="text-center">'+req.message+'</h5>\
							</div>\
						</div>';
						$('div.turnamen-terlaris').html('')
					} else {
						$.each(req.data,function(index,obj) {
							terlaris();
							html += '\
							<a href="<?php echo base_url('turnamen') ?>" style="text-decoration: none">\
								<div class="m-portlet m-portlet--mobile hover">\
									<div class="row">\
										<div class="col-md-3">\
											<div style="padding: 5%; margin-top: 2px">\
												<img src="<?php echo base_url('assets/app/media/img/products/'); ?>'+req.image+'" style="width: 100%" class="rounded border">\
											</div>\
										</div>\
										<div class="col-md-9">\
											<div class="m-portlet__head">\
												<div class="m-portlet__head-caption">\
													<div class="m-portlet__head-title">\
														<h3 class="m-portlet__head-text">\
															'+obj.nama+'\
														</h3>\
													</div>\
												</div>\
											</div>\
											<div class="m-portlet__body">\
												<div class="row">\
													<div class="col-sm-2">\
														ENTRY\
														<br><b>'+obj.entry+'</b>\
													</div>\
													<div class="col-sm-2">\
														SLOTS\
														<br><b>'+obj.slots+'</b>\
													</div>\
													<div class="col-sm-2">\
														TIME \
														<br><b>'+obj.date_start+'</b>\
													</div>\
													<div class="col-sm-2">\
														CLOSE IN \
														<br>'+obj.date_end+'\
													</div>\
													<div class="col-sm-3" align="right">\
														Cookies\
														<br>'+obj.cookies+'\
													</div>\
														<i class="fa fa-cookie-bite text-warning" style="font-size: 30px"></i>\
													<!-- </div> -->\
												</div>\
											</div>\
										</div>\
									</div>\
								</div>\
							</a>'; 
						})
					}
					$('div.all-turnamen').html(html);
				}
			})
		}
		show()

		function terlaris() {
			$.ajax({
				url : "<?php echo base_url('api/Turnamen/terlaris'); ?>",
				method : "POST",
				async : true,
				success : function(req) {
					html = '';
					$.each(req.data,function(index,obj) {
						html += '\
						<div class="col-sm-4">\
							<a href="<?php echo base_url('turnamen') ?>">\
								<div class="m-portlet m-portlet--mobile">\
									<img class="hover" src="<?php echo base_url('assets/app/media/img/tournament/'); ?>'+obj.image+'" alt="" style="width: 100%" class="rounded border">\
								</div>\
							</a>\
						</div>\
						';
					})
				}
			})
		}
	})
</script>