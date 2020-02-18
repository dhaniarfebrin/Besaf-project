<script>
	$(document).ready(function() {

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

		$(document).on('mouseenter','.hover',function() {
			$(this).addClass('shadow-lg');
			$(this).addClass('border');
		});

		$(document).on('mouseleave','.hover',function() {
			$('.hover').removeClass('shadow-lg');
			$('.hover').removeClass('border');
		});

		function get_game() {
			$.ajax({
				url : "<?php echo base_url('api/Profile/Show_games') ?>",
				method : "POST",
				success : function(req) {
					game = '<option value=""></option>';
					$.each(req.data, function (index,obj) {
						game +='\
							<option value="'+obj.id+'">'+obj.game_name+'</option>\
						'
					})
					$('select.pilihan-komunitas-game').html(game);
				}
			})
		}
		get_game();

		/*Menampilkan semua komunitas.*/
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
							<div class="col-sm-4">\
								<a href="<?php echo base_url('Community/info/'); ?>'+obj.komunitas_id+'" style="text-decoration: none">\
									<div class="m-portlet m-portlet--mobile hover">\
										<div class="row no-gutters">\
											<div class="col-xs-5">\
												<div style="padding: 5px;">\
													<img src="<?php echo base_url('api/img/komunitas/')?>'+obj.foto_identitas+'" style="max-height: 85px; max-width: 85px; padding: 3px; margin-top: 5px" class="border">\
												</div>\
											</div>\
											<div class="col-xs-7">\
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

		/*Menampilkan komunitas user*/
		function my_community() {
			$.ajax({
				url : "<?php echo base_url('api/Komunitas/my'); ?>",
				method : "POST",
				async : true,
				data : {
					id : '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success : function(req) {
					my_community = '';
					if (req.data == '' || req.data == null) {
						my_community += '\
						<div class="col-12 mb-4" align="center">\
							'+req.message+'\
						</div>\
						';
					} else {
						$.each(req.data,function(index,obj) {
							if (index<4) {
								my_community += '\
								<div class="col-3">\
									<a href="<?php echo base_url('Community/info/') ?>'+obj.komunitas_id+'">\
										<img src="<?php echo base_url('api/img/komunitas/') ?>'+obj.foto+'" alt="" class="hover rounded" style="width: 100%">\
									</a>\
								</div>\
								';
							}
						})
					}
					$('div.my-community').html(my_community);
				}
			})
		}
		my_community()

		function my_community_selengkapnya() {
			$.ajax({
				url : "<?php echo base_url('api/Komunitas/my'); ?>",
				method : "POST",
				async : true,
				data : {
					id : '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success : function(req) {
					my_community_selengkapnya = '';
					if (req.error==true) {
						my_community_selengkapnya += '';
					} else {
						$.each(req.data,function(index,obj) {
							if (index>=4) {
								my_community_selengkapnya += '\
								<div class="col-3">\
									<a href="<?php echo base_url('Community/info/') ?>'+obj.komunitas_id+'">\
										<img src="<?php echo base_url('api/img/komunitas/') ?>'+obj.foto+'" alt="" class="hover rounded" style="width: 100%">\
									</a>\
								</div>\
								';
							}
						})
					}
					$('div.my-community-selengkapnya').html(my_community_selengkapnya);
				}
			})
		}
		my_community_selengkapnya();

		/*Menampilkan tournament2*/
		function show_tournament(jadwal) {
			$.ajax({
				url : "<?php echo base_url('api/Turnamen/show') ?>",
				method : "POST",
				data : {
					jadwal : jadwal
				},
				async : true,
				success : function(req) {
					html = '';
					if (req.error==true) {
						html += '\
						<div class="m-portlet m-portlet--mobile">\
							<div class="m-portlet__body">\
								<h5 class="text-center">'+req.message+'</h5>\
							</div>\
						</div>';
						$('div.all-turnamen').html('')
					} else {
						$.each(req.data,function(index,obj) {
							if (obj.entry=='1') {
								entry = "Free";
							} else {
								entry = "Group / Squad";
							}
							html += '\
							<a href="<?php echo base_url('turnamen/info/') ?>'+obj.id+'" style="text-decoration: none">\
								<div class="m-portlet m-portlet--mobile hover">\
									<div class="row">\
										<div class="col-md-3">\
											<div style="padding: 5%; margin-top: 2px;" align="center">\
												<img src="<?php echo base_url('api/img/turnamen/') ?>'+obj.image+'" style="width: 100%; max-height: 200px; max-width: 200px" class="rounded border">\
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
														<br><b>'+entry+'</b>\
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
		show_tournament()
		$(document).on('change','select.jadwal',function() {
			show_tournament(this.value);
		})


		/*Menampilkan tournament terlaris*/
		function terlaris() {
			$.ajax({
				url : "<?php echo base_url('api/Turnamen/terlaris'); ?>",
				method : "POST",
				async : true,
				success : function(req) {
					html = '';
					if (req.error==true) {
						html += '\
						<div class="col-md-12" align="center">\
							<big>Belum tersedia</big>\
						</div>\
						';
					} else {
						$.each(req.data,function(index,obj) {
							html += '\
							<div class="col-4" align="center">\
								<a href="<?php echo base_url('turnamen/info/') ?>'+obj.id+'">\
									<div class="m-portlet m-portlet--mobile hover p-2">\
										<img src="<?php echo base_url('api/img/turnamen/'); ?>'+obj.image+'" alt="turnament.JPG" style="width: 100%; max-height: 150px; max-width: 150px">\
									</div>\
								</a>\
							</div>\
							';
						})
					}
					$('div.turnamen-terlaris').html(html);
				}
			})
		}
		terlaris();

		/*upload foto*/
		$(document).on('change','input.file',function(e) {
			file = e.target.files[0];
			$('label.label-file').html(file.name);
			canvasResize(file, {
                width: 400,
                height: 400,
                crop: true,
                quality: 100,
                // rotate: 90,
                callback : function(data) {
                	$('input.foto_identitas').val(data);
                	$('img.foto_identitas').attr('src',data);
                }
    		});
		})

		/*membuat komunitas*/
		$(document).on('submit','form.buat-komunitas',function() {
			nama = $('input.nama').val();
			deskripsi = $('textarea.deskripsi').val();
			kategori = $('select.kategori').val();
			game_id = $('select.pilihan-komunitas-game').val();
			nomor_identitas = $('input.nomor_identitas').val();
			foto_identitas = $('input.foto_identitas').val();
			nomor_telpon = $('input.nomor_telpon').val();
			$.ajax({
				url : "<?php echo base_url('api/Komunitas/create'); ?>",
				method : "POST",
				data : {
					nama : nama,
					deskripsi : deskripsi,
					kategori : kategori,
					game_id : game_id,
					nomor_identitas : nomor_identitas,
					foto_identitas : foto_identitas,
					nomor_telpon : nomor_telpon,
					user_id : '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success : function(req) {	
					if (req.error==true) {
						$.notify({
							message : req.message
						},{
							type : "danger",
							placement : {
								from : "bottom",
								align : "right"
							}
						})
					} else {
						$.notify({
							message : req.message
						},{
							type : "success",
							placement : {
								from : "bottom",
								align : "right"
							}
						})
						$('input.nama').val('');
						$('textarea.deskripsi').val('');
						$('select.kategori').val('');
						$('select.game_id').val('');
						$('input.nomor_identitas').val('');
						$('input.foto_identitas').val('');
						$('input.nomor_telpon').val('');
						$('div#buat').modal('hide');
						my_community_selengkapnya()
						my_community()
						get_community()
					}
				}
			})
			return false;
		})

		function get_discover() {
			$.ajax({
				url : "<?php echo base_url('api/Discover/show'); ?>",
				method : "POST",
				async : true,
				success : function(req) {
					if (req.data=='') {
						first_discover = '\
						<div class="col-sm-12 mb-5">\
							<p align="center">'+req.message+'</p>\
						</div>';
					} else {
						first_discover = '';
						$.each(req.data,function(index,obj) {
							first_discover += '\
							<div class="col-sm-3 mb-5">\
								<a href="#lihat_post" class="text-dark lihat_post" data-toggle="modal" style="text-decoration: none" data-id="'+obj.id+'" data-user="'+obj.user_nama+'" data-user-image="'+obj.user_image+'" data-date="'+obj.create_date+'" data-like="'+obj.likes+'" data-image="'+obj.image+'">\
									<div class="m-portlet m-portlet--mobile hover" style="width: 100%;">\
									  	<img class="card-img-top" src="<?php echo base_url('api/img/user_post/'); ?>'+obj.image+'" alt="Card image cap" class="hover">\
									  	<div class="card-body">\
									    	<p class="card-text">\
									    		<strong>'+obj.user_nama+'</strong> <br>\
									    		<small>'+obj.create_date+'</small>\
									    	</p>\
									  	</div>\
									</div>\
								</a>\
							</div>';
						})
					}
					$('div.first_discover').html(first_discover);
				}
			})
		}

		get_discover();

		$(document).on('click','a.lihat_post',function() {
			id = $(this).data('id');
			user = $(this).data('user');
			user_image = $(this).data('user_image');
			post_image = $(this).data('image');
			date = $(this).data('date');
			like = $(this).data('like');
			$('img.post-image').attr('src','<?php echo base_url('api/img/user_post/') ?>'+post_image)
			$('img.user-image').attr('src','<?php echo base_url('api/img/user_post/') ?>'+user_image)
			$('b.user-name').html(user)
			$('small.date').html(date)
			$('i.likes').html(' '+like)
		})

		$(document).on('change','input.team-avatar',function(e) {
			file = e.target.files[0];
			$('label.team-avatar-name').html(file.name);
			canvasResize(file, {
                width: 400,
                height: 400,
                crop: true,
                quality: 100,
                callback : function(data) {
                	$('input.team-avatar-name').val(data);
                	$('img.team-avatar').attr('src',data);
                }
    		});	
		})

		function my_team() {
			$.ajax({
				url : '<?php echo base_url('api/Team/myteam') ?>',
				method : "POST",
				data : {
					user_id : '<?php echo $this->session->userdata('user_id'); ?>',
				},
				success : function (req) {
					if (req.error == false) {
						myteam = '';
						$.each(req.data, function(index,obj) {
							myteam += '\
								<a class="hover row p-4 text-dark" href="<?php echo base_url('Team/info/') ?>'+obj.team_id+'">\
									<div class="col-3">\
										<img src="<?php echo base_url('api/img/team/') ?>'+obj.team_gambar+'" style="width : 50px; height: 50px;" class="rounded rounded-circle">\
									</div>\
									<div class="col">\
										<big>'+obj.team_nama+'</big>\
									</div>\
								</a>\
							';
						})
						$('table.my-team').html(myteam)
					}
				}
			})
		}

		my_team();
		
		function show_notif() {
			$.ajax({
				url : "<?php echo base_url('api/User/notifikasi') ?>",
				method : "POST",
				data : {
					user_id : '<?php echo $this->session->userdata('user_id'); ?>'
				},
				success : function(req) {
					notif = '';
					if (req.error == true) {
						notif += '<div align="center">'+req.message+'</div>'
					} else {
						$.each(req.data, function(index,obj) {
							if (req.data.length > 0) {
								$('span.jumlah-notifikasi').html(req.data.length);
							}

							if (obj.type == '1') {
								type = "Pemberitahuan"
								tombol = '';
							} else {
								type = "Konfirmasi"
								tombol = '\
								<div class="row no-gutters ml-auto mb-1">\
									<style>\
										.confirmation-btn-false:hover {\
											background-color: red !important;\
											cursor: pointer;\
											color: white !important;\
										}\
										\
										.confirmation-btn-true:hover {\
											background-color: green !important;\
											cursor: pointer;\
											color: white !important;\
										}\
									</style>\
									<button type="button" class="bg-transparent border-0 rounded-circle far fa-times-circle confirmation-btn-false" style="color: red"></button>\
									<button type="button" class="bg-transparent border-0 rounded-circle far fa-check-circle confirmation-btn-true btn-konfirmasi" data-id="'+obj.id+'" data-user="<?php echo $this->session->userdata('user_id'); ?>" data-team="'+obj.team_id+'" data-komunitas="'+obj.komunitas_id+'" style="color:green"></button>\
								</div>\
								'
							}

							notif += '\
							<div class="card p-2" style="max-width: 100%; height: auto">\
								<div class="row no-gutters">\
									<div class="col-md-2">\
										<img src="<?= base_url() ?>assets/img/profile.jpg" class="card-img rounded-circle" style="margin-top: 25%" alt="gambar">\
									</div>\
									<div class="col-md-10">\
										<div class="card-body">\
											<h5 class="card-title">'+type+'</h5>\
											<div class="row no-gutters">\
												<p class="card-text">'+obj.pesan+'</p>\
												<p class="card-text"><small class="text-muted">'+obj.created_at+'</small></p>\
												'+tombol+'\
											</div>\
										</div>\
									</div>\
								</div>\
							</div>\
							'
						})
					}
					$('div.data-notifikasi').html(notif);
				}
			})
		}

		show_notif();

		$(document).on('submit','form.create_team',function() {
			nama = $('input.team-name').val();
			gambar = $('input.team-avatar-name').val();
			game_id = $('select.team-game').val();
			alias = $('input.team-tag').val();
			$.ajax({
				url : "<?php echo base_url('api/Team/create') ?>",
				method : "POST",
				data : {
					user_id : '<?php echo $this->session->userdata('user_id'); ?>',
					nama : nama,
					gambar : gambar,
					game_id : game_id,
					alias : alias
				},
				success : function(req) {
					if (req.error == true) {
						$.notify({
							message : req.message
						},{
							type : "danger",
							placement : {
								from : "bottom",
								align : "right"
							}
						})
					} else {
						$.notify({
							message : req.message
						},{
							type : "success",
							placement : {
								from : "bottom",
								align : "right"
							}
						})
						$('div#create_team').modal('hide');
						$('input.team-name').val('');
						$('input.team-avatar-name').val('');
						$('select.team-game').val('');
						$('input.team-tag').val('');
						$('img.team-avatar').attr('src','');
						$('label.team-avatar-name').html('');
					}
					my_team();
				}
			})
			return false;
		})

		$(document).on('click','button.btn-konfirmasi',function() {
			id = $(this).data('id');	
			user_id = $(this).data('user');
			team_id = $(this).data('team');
			komunitas_id = $(this).data('komunitas');

			if (komunitas_id == null) {
				$.ajax({
					url : "<?php echo base_url('api/User/konfirmasi'); ?>",
					method : "POST",
					data : {
						user_id : user_id,
						team_id : team_id,
						komunitas_id : komunitas_id
					},
					success : function(req) {
						if (req.error == true) {
							$.notify({
								message : req.message
							},{
								type : "danger",
								placement : {
									from : "bottom",
									align : "right"
								}
							})
						} else {
							$.notify({
								message : req.message
							},{
								type : "success",
								placement : {
									from : "bottom",
									align : "right"
								}
							})
						}
					}
				})
			} else {
				$('div#modal-konfirmasi').modal('show')
			}
			return false;
		})

		function notif(data,type,message) {
			$(data).html('\
				<div class="alert alert-'+type+'">\
					'+message+'\
					<button class="close pull-right" data-dismiss="alert" type="button"></button>\
				</div>\
				');
		}
	});
</script>
<div class="modal fade" id="modal-konfirmasi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Konfirmasi User</h3>
			</div>
			<div class="modal-body">
				<table class="table table-sm">
					<thead>
						<tr>
							<th>No. </th>
							<th>Username</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		
		function show_konfirmasi_user() {
			$.ajax({
				url : "<?php echo base_url('api/Team/konfirmasiuser') ?>",
				method : "POST",
				data : {

				}
			})
		}

	})
</script>