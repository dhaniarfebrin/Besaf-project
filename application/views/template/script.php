<script>
	$(document).ready(function() {
		// $('div.chat').hide();

		// $(document).on('click','a.fa-minus',function() {
		// 	$('div.chat').hide(1000);
		// 	$('a.toggle-chat').removeClass('fa-minus');
		// 	$('a.toggle-chat').addClass('fa-comment');
		// })
		// $(document).on('click','a.fa-comment',function() {
		// 	$('div.chat').show(1000);
		// 	$('a.toggle-chat').removeClass('fa-comment');
		// 	$('a.toggle-chat').addClass('fa-minus');
		// })

		$(document).on('click','li.demo',function() {
			$('li.demo').removeClass('active');
			$(this).addClass('active');
		})

		$('div.m-content').css({
			background : "none"
		});

		$('a.nav-link').on('click',function() {
			$('a.nav-link').removeClass('active');
			$(this).data().addClass('active');
		});

		$(document).on('submit','form#buat-komunitas',function() {
			nama = $('input.nama-komunitas').val();
			deskripsi = $('textarea.deskripsi-komunitas').val();
			kategori = $('select.kategori-komunitas').val();
			game = $('select.game-komunitas').val();
			identitas = $('input.identitas-komunitas').val();
			telp = $('input.telp-komunitas').val();

			if (nama == '') {
				$('input.is-invalid').removeClass('is-invalid');
				$('small.text-danger').remove();
				$('input.nama-komunitas').addClass('is-invalid');
				$('input.nama-komunitas').focus();
				$('input.nama-komunitas').after('\
					<small class="text-danger">Nama Komunitas harus diisi.</small>\
					')
			} else if (identitas == '') {
				$('input.is-invalid').removeClass('is-invalid');
				$('small.text-danger').remove();
				$('input.identitas-komunitas').addClass('is-invalid');
				$('input.identitas-komunitas').focus();
				$('input.identitas-komunitas').after('\
					<small class="text-danger">No. identitas harus diisi</small>\
					');
			} else if (telp == '') {
				$('input.is-invalid').removeClass('is-invalid');
				$('small.text-danger').remove();
				$('input.telp-komunitas').addClass('is-invalid');
				$('input.telp-komunitas').focus();
				$('input.telp-komunitas').after('\
					<small class="text-danger">No. identitas harus diisi</small>\
					');
			} else {
				alert('oke');
			}
			return false;
		});

		$(document).on('mouseenter','.hover',function() {
			$(this).addClass('shadow-lg');
			$(this).addClass('border');
		});

		$(document).on('mouseleave','.hover',function() {
			$('.hover').removeClass('shadow-lg');
			$('.hover').removeClass('border');
		});

		function notif(data,type,message) {
			$(data).html('\
				<div class="alert alert-'+type+'">\
					'+message+'\
					<button class="close pull-right" data-dismiss="alert" type="button"></button>\
				</div>\
				');
		}

		function get_community() {
			$.ajax({
				url : "<?php echo base_url('api/Komunitas/show'); ?>",
				method : "POST",
				async : true,
				success : function(req) {
					html = '';
					if (req.error==true) {
						html += '\
						<div class="col-md-12 m-portlet m-portlet--mobile">\
							<div class="m-portlet__body">\
								<h4 class="text-center">'+req.message+'</h4>\
							</div>\
						</div>';
					} else {
						$.each(req.data,function(index,obj) {
							html += '\
							<div class="col-md-4">\
								<a href="<?php echo base_url('Community/info/'); ?>'+obj.komunitas_id+'" style="text-decoration: none">\
									<div class="m-portlet m-portlet--mobile hover">\
										<div class="row no-gutters">\
											<div class="col">\
												<div style="padding: 5px;">\
													<img src="<?php echo base_url('assets/img/komunitas/')?>'+obj.foto_identitas+'" style="width: 100%; padding: 3px; margin-top: 5px" class="border">\
												</div>\
											</div>\
											<div class="col">\
												<div class="m-portlet__body">\
													<h5 class="m-portlet__head-text">\
														'+obj.nama+'\
													</h5>\
													'+obj.jumlah_member+' Member\
												</div>\
											</div>\
										</div>\
									</div>\
								</a>\
							</div>';
						});
					}
					$('div#daftar-komunitas').html(html);
				}
			})
		}
		get_community();

		function my_community() {
			$.ajax({
				url : "<?php echo base_url('api/Komunitas/my'); ?>",
				method : "POST",
				async : true,
				data : {
					id : 3
				},
				success : function(req) {
					html = '';
					if (req.error==true) {
						html += '\
						<div class="col-md-3">\
							<a href="#">\
								<div style="padding: 5px; width: 80%; height: 130px; background: #BEB9B9; border-radius: 5px"></div>\
							</a>\
						</div>\
						<div class="collapse" id="selengkapnya">\
							<br><br><br>\
						</div>\
						<div align="center">\
							<a href="#" data-toggle="collapse" data-target="#selengkapnya">\
								<b class="text-danger">Selengkapnya <i class="fa fa-angle-down"></i></b>\
							</a>\
						</div>\
						';
					} else {
						$.each(req.data,function(index,obj) {
							html += '\
							<div class="col-md-3">\
								<a href="<?php echo base_url('Community/info/') ?>'+obj.komunitas_id+'">\
									<img src="<?php echo base_url('assets/img/komunitas/') ?>'+obj.foto+'" alt="" class="hover rounded" style="width: 100%">\
								</a>\
							</div>\
							<div class="collapse" id="selengkapnya">\
								<div class="col-md-3 mt-3">\
									<a href="<?php echo base_url('Community/info/') ?>'+obj.komunitas_id+'">\
										<img src="<?php echo base_url('assets/img/komunitas/') ?>'+obj.foto+'" alt="" class="hover rounded" style="width: 100%">\
									</a>\
								</div>\
							</div>\
							<div align="center">\
								<a href="#" data-toggle="collapse" data-target="#selengkapnya">\
									<b class="text-danger">Selengkapnya <i class="fa fa-angle-down"></i></b>\
								</a>\
							</div>\
							';
						})
					}
					$('div.my-community').html(html);
				}
			})
		}

		my_community()
	});
</script>