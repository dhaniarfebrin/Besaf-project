<script>
	$(document).ready(function() {

		role_user = <?php echo $this->session->userdata('role'); ?>1;

		if (role_user == '1') {
			$('.admin').show();
		} else {
			$('.admin').hide();
		}

		function info_community() {
			$.ajax({
				url: "<?php echo base_url('api/Komunitas/info'); ?>",
				method: "POST",
				async: true,
				data: {
					id: <?php echo $this->session->userdata('komunitas_id'); ?>
				},
				async: true,
				success: function(req) {
					$.each(req.data, function(index, obj) {
						if (obj.game_id == null) {
							$('div.community-game').html('\
								<div class="col-md-12 mt-3">\
									<table class="table table-hover">\
										<tr><td align="center">\
											game belum tersedia.\
										</td></tr>\
									</table>\
								</div>\
							');
						} else {
							$('div.community-game').html('\
								<div class="col-md-4 mt-3">\
									<a href="#">\
										<img class="hover" src="<?php echo base_url('assets/app/media/img/products/') ?>' + obj.game_nama + '" style="width: 100%">\
									</a>\
								</div>\
							');
						}
					})
				}
			})
		}
		info_community();

		function member() {
			$.ajax({
				url: "<?php echo base_url('api/Komunitas/member'); ?>",
				method: "POST",
				async: true,
				data: {
					komunitas_id: <?php echo $this->session->userdata('komunitas_id'); ?>
				},
				success: function(req) {
					admin = '';
					html = '';
					if (req.error == true) {
						html += '\
						<div class="col-md-12" align="center">\
							<div class="card shadow-sm">\
								<div class="card-body">\
									<big>' + req.message + '</big>\
								</div>\
							</div>\
						</div>\
						';
					} else {
						$.each(req.data, function(index, obj) {
							//cek foto user
							if (obj.user_foto == null) {
								foto = 'profile.JPG';
							} else {
								foto = obj.user_foto;
							}

							//role_user
							if (obj.user_role == '1') {
								role = "Admin";
							} else if (obj.user_role == '2') {
								role = "User";
							}

							if (obj.user_role == '1') {
								admin += '\
								<tr>\
									<td style="width: 20%"><img src="<?php echo base_url('assets/img/') ?>' + foto + '" alt="" class="rounded rounded-circle" style="width: 100%"></td>\
									<td>\
										<h5>' + obj.user_username + '</h5>\
										<small>Admin</small>\
									</td>\
									<td align="right">\
										<button class="btn btn-info">Follow</button>\
										<button class="btn btn-info"><i class="fa fa-comment"></i></button>\
									</td>\
								</tr>\
								';
							} else {
								admin += '\
								<tr><td colspan="3" align="center">' + req.message + '</td></tr>\
								';
							}

							html += '\
								<div class="col-md-4">\
									<a href="#" style="text-decoration: none;" class="text-dark">\
										<div class="m-portlet m-portlet--mobile hover shadow row no-gutters" style="height:90px; padding: 5px">\
											<div class="col">\
												<img src="<?php echo base_url('assets/img/') ?>' + foto + '" alt="Users" class="rounded rounded-circle mr-3" style="max-height: 80px">\
											</div>\
											<div class="col" style="margin-top: 10px">\
												<h5>' + obj.user_nickname + '</h5>\
												<small>' + role + '</small>\
											</div>\
											<div class="col">\
												<button class="btn btn-info mt-5" >follow</button>\
											</div>\
										</div>\
									</a>\
								</div>\
							';
						})
					}
					$('tbody#community-admin').html(admin);
					$('h2.jumlah-member').html(req.data['length']);
					$('div.member').html(html);
				}
			})
		}
		member();

		function community_turnamen() {
			$.ajax({
				url: "<?php echo base_url('api/Komunitas/turnamen') ?>",
				method: "POST",
				async: true,
				data: {
					komunitas_id: <?php echo $this->session->userdata('komunitas_id'); ?>
				},
				success: function(req) {
					html = '';
					if (req.error == true) {
						html += '\
							<div class="col-md-12">\
								<div class="card shadow-sm">\
									<div class="card-body text-center">\
										<big>' + req.message + '</big>\
									</div>\
								</div>\
							</div>\
						';
					} else {
						$.each(req.data, function(index, obj) {
							html += '\
							<a href="<?php echo base_url('turnamen/info/') ?>' + obj.id + '" style="text-decoration: none">\
								<div class="m-portlet m-portlet--mobile hover border">\
									<div class="row">\
										<div class="col-md-3">\
											<div style="padding: 5%; margin-top: 2px">\
												<img src="<?php echo base_url('api/img/turnamen/'); ?>' + obj.image + '" style="width: 100%" class="rounded border">\
											</div>\
										</div>\
										<div class="col-md-9">\
											<div class="m-portlet__head">\
												<div class="m-portlet__head-caption">\
													<div class="m-portlet__head-title">\
														<h3 class="m-portlet__head-text">\
															' + obj.nama + '\
														</h3>\
													</div>\
												</div>\
											</div>\
											<div class="m-portlet__body">\
												<div class="row">\
													<div class="col-md-2">\
														ENTRY\
														<br><b>' + obj.entry + '</b>\
													</div>\
													<div class="col-md-2">\
														SLOTS\
														<br><b>' + obj.slots + '</b>\
													</div>\
													<div class="col-md-2">\
														TIME \
														<br><b>' + obj.date_start + '</b>\
													</div>\
													<div class="col-md-2">\
														CLOSE IN \
														<br>' + obj.date_end + '\
													</div>\
													<div class="col-md-3" align="right">\
														Cookies\
														<br>' + obj.cookies + '\
													</div>\
														<i class="fa fa-cookie-bite text-warning" style="font-size: 30px"></i>\
													<!-- </div> -->\
												</div>\
											</div>\
										</div>\
									</div>\
								</div>\
							</a>\
							';
						})
					}
					$('div.community-turnamen').html(html);
				}
			})
		}

		community_turnamen();

		function community_leaderboard() {
			$.ajax({
				url: "<?php echo base_url('api/Komunitas/leaderboard'); ?>",
				method: "POST",
				async: true,
				data: {
					komunitas_id: <?php echo $this->session->userdata('komunitas_id'); ?>
				},
				success: function(req) {
					$('div.foto-identitas').html('\
						<img src="<?php echo base_url('api/img/komunitas/'); ?>' + req.data[0].foto_identitas + '" style="width: 100%; padding: 5px" class="rounded shadow-sm">\
						');
				}
			})
		}

		community_leaderboard();

		function community_post() {
			$.ajax({
				url: "<?php echo base_url('api/Komunitas/postingan'); ?>",
				method: "POST",
				data: {
					komunitas_id: <?php echo $this->session->userdata('komunitas_id'); ?>
				},
				success: function(req) {
					html = '';
					if (req.error == true) {
						html += '\
						<div align="center">\
							<img src="<?php echo base_url('assets/img/postingan/default.JPG') ?>" alt="' + req.message + '">\
						</div>\
						';
					} else {
						$.each(req.data, function(index, obj) {
							html += '\
							<p>' + obj.caption + '</p>\
							<img src="<?php echo base_url('api/img/user_post/') ?>' + obj.image + '" alt="" style="width: 100%">\
							<div class="card">\
								<button class="btn btn-light btn-block btn-like" data-id="'+obj.id+'" data-like="'+obj.likes+'">\
									<i class="la la-heart-o text-danger"></i>\
									Likes\
									<b>' + obj.likes + '</b>\
								</button>\
								<button class="btn btn-light btn-block">\
									<i class="flaticon-comment"></i>\
									Comment\
								</button>\
							</div>\
							';
						})
					}
					$('h2.jumlah-postingan').html(req.data['length']);
					$('div.postingan').html(html);
				}
			})
		}
		community_post();

		$(document).on('submit', 'form#create', function() {
			nama = $('input.nama').val();
			deskripsi = $('textarea.deskripsi').val();
			kategori = $('select.kategori').val();
			game_id = $('select.game_id').val();
			nomor_identitas = $('input.nomor_identitas').val();
			nomor_telpon = $('input.nomor_telpon').val();
			foto_identitas = $('input.foto_identitas').prop('files')[0];

			if (nama == '') {
				$('input.nama').focus();
			} else if (deskripsi == '') {
				$('textarea.deskripsi').focus();
			} else if (nomor_identitas == '') {
				$('input.nomor_identitas').focus();
			} else if (nomor_telpon == '') {
				$('input.nomor_telpon').focus();
			}
			$.ajax({
				url: "<?php echo base_url('api/Komunitas/create'); ?>",
				method: "POST",
				data: {
					nama: nama,
					deskripsi: deskripsi,
					game_id: game_id,
					nomor_identitas: nomor_identitas,
					nomor_telpon: nomor_telpon,
					foto_identitas: foto_identitas['name']
				},
				success: function(req) {
					if (req.error == true) {
						notif('div.pesan-tambah', 'danger', req.message);
					} else {
						notif('div.pesan-tambah', 'success', req.message);
					}
				}
			})
			return false;
		});

		$(document).on('click', 'button.btn-join', function() {
			$.ajax({
				url: "<?php echo base_url('api/Komunitas/join'); ?>",
				method: "POST",
				data: {
					user_id: '<?php $this->session->userdata('user_id'); ?>',
					komunitas_id: '<?php echo $this->session->userdata('komunitas_id'); ?>'
				},
				success: function(req) {
					if (req.error == true) {
						notif('div.pesan', 'danger', req.message);
					} else {
						notif('div.pesan', 'success', req.message);
					}
				}
			})
		})

		$(document).on('click','button.btn-like',function() {
			$.ajax({
				url : "<?php echo base_url('api/Discover/likes') ?>",
				method : "POST",
				data : {
					id : $(this).data('id')
				},
				success : function(req) {
					if (req.error == true) {
						notif('div.pesan','danger',req.message);
					} else {
						notif('div.pesan','success',req.message);
						community_post();
					}
				}
			})
		})

		function notif(data, type, pesan) {
			$(data).html('\
				<div class="alert alert-' + type + '" style="position: fixed; top: 0; right: 0; z-index: 99; margin-top : 80px; width : 100%;">\
					' + pesan + '\
					<button class="close" data-dismiss="alert" type="button" style="margin-top: -9px;"></button>\
				</div>\
				');
		}

	})
</script>