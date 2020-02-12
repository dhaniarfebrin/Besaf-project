<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatable/css/dataTables.bootstrap4.css'); ?>">
<script src="<?php echo base_url('assets/plugins/datatable/js/jquery.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.bootstrap4.js'); ?>"></script>
<script>
	$(document).ready(function() {
		
		function show() {
			$.ajax({
				url : "<?php echo base_url('api/Team/info') ?>",
				method : "POST",
				data : {
					id : "<?php echo $this->session->userdata('team_id'); ?>"
				},
				success : function(req) {
					if (req.error == false) {
						$('h3.nama-team').html(req.data.nama);
						$('img.image-team').attr('src','<?php echo base_url('api/img/team/') ?>'+req.data.gambar)
					}
				}
			})
		}

		show();

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

		my_team()

		function member_team() {
			$('table.data-member').DataTable({
				"deferRender" : true,
				"ajax" : {
					url : "<?php echo base_url('api/Team/member') ?>",
					method : "POST",
					data : {
						id : '<?php echo $this->session->userdata('team_id'); ?>'
					},
					dataSrc : "data"
				},
				"columns" : [
					{
						data : null,
						render : function(data,type,row,meta) {
							return  meta.row + meta.settings._iDisplayStart + 1;
						}
					},
					{
						data : "user_username"
					},
					{
						data : null,
						render : function(req) {
							if (req.user_image == '' || req.user_image == null) {
								foto = 'default.jpg'
							} else {
								foto = req.user_image
							}
							return '<img src="<?php echo base_url('api/img/profile/') ?>'+foto+'" style="width: 50px;" class="rounded">';
						}
					},
					{
						data : null,
						render : function(req) {
							if (req.role == '1') {
								role = "Captain"
							} else {
								role = "User"
							}
							return role;
						}
					},
					{
						data : null,
						render : function(req) {
							return '\
								<a href="<?php echo base_url(''); ?>'+req.user_id+'" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>\
								<button class="btn btn-primary btn-sm btn-kick-member" data-toggle="modal" data-target="#hapus" data-id="'+req.id+'"><i class="fa fa-trash"></i></button>\
							';
						}
					}
				]
			});
		}

		member_team();

		$(document).on('click','button.btn-kick-member',function() {
			id = $(this).data('id');
			$('input.id-kick-member').val(id);
		})

		$(document).on('submit','form.form-hapus',function() {
			id = $('input.id-kick-member').val();
			$.ajax({
				url : "<?php echo base_url('api/Team/kick'); ?>",
				method : "POST",
				data : {
					id : id
				},
				success : function(req) {
					if (req.error == true) {
						notif('div.pesan-hapus','danger',req.message)
					} else {
						$('div#hapus').modal('hide');
						$('input.id-kick-member').val('');
						notif('div.pesan','success',req.message);
						$('table.data-member').DataTable().destroy();
						member_team();
					}
				}
			})
			return false;
		})

		$(document).on('keyup','input.cari-member',function() {
			data = $('input.cari-member').val();
			if (data == '') {
				$('tbody.member-baru').html('\
					<tr><td colspan="4" align="center">Ketik beberapa kata</td></tr>\
					')
			} else {
				$.ajax({
					url : "<?php echo base_url('api/Team/carimember') ?>",
					method : "POST",
					data : {
						data : data
					},
					success : function(req) {
						html = '';
						if (req.data == '' || req.data == null) {
							html += '<tr><td colspan="4" align="center">'+req.message+'</td></tr>'
						} else {
							$.each(req.data,function(index,obj) {
								if (obj.image == '' || obj.image == null) {
									image = 'default.jpg';
								} else {
									image = obj.image;
								}

								html += '\
								<tr>\
									<td>'+(parseInt(index)+1)+'</td>\
									<td><img src="<?php echo base_url('api/img/profile/') ?>'+image+'" class="rounded rounded-circle" style="width: 30px"></td>\
									<td>'+obj.username+'</td>\
									<td align="right">\
										<button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus"></i></button>\
									</td>\
								</tr>'

							})
						}
						$('tbody.member-baru').html(html);
					}
				})
			}
		})

		function notif(element,type,message) {
			$(element).html('\
				<div class="alert alert-'+type+'">\
					'+message+'\
					<button class="close" data-dismiss="alert" type="button"></button>\
				</div>\
				')
		}

	})
</script>