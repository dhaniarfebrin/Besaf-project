<div class="main">
	<div class="container mt-5">
		<h2>Team Details</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="card-image">
							<div class="pt-3 image-thumbnail">
								<img src="" alt="" style="width: 125px" class="img team_gambar">
							</div>
						</div>
						<div class="mt-3 text-center">
							<h5 class="card-title text-center font-weight-bold team_nama">
								Community
							</h5>
							<div class="card-text text-secondary team_game">
								Mobile legends: Bang Bang
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card">
					<div class="card-body">
						<h5 class="p-2">info</h5>
						<hr>
						<div class="container mt-3">
							<table class="table table-borderless text-white mx-auto">
								<tbody>
									<tr>
										<th>Name</th>
										<td class="text-secondary team_nama">Nama Team</td>
									</tr>
									<tr>
										<th>Alias</th>
										<td class="text-secondary team_alias">Alias Team</td>
									</tr>
									<tr>
										<th>Member(s)</th>
										<td class="">
											<ul class="text-secondary team_member">
												<li>Member Team</li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>
<script>
	$(document).ready(function() {
		
		function show() {
			$.ajax({
				url : "<?php echo base_url('api/Admin_team/details') ?>",
				method : "POST",
				data : {
					id : '<?php echo $this->session->userdata('team_id'); ?>'
				},
				success : function(req) {
					$('img.team_gambar').attr('src','<?php echo base_url('api/img/team/') ?>'+req.data.gambar);
					$('.team_nama').html(req.data.nama);
					$('div.team_game').html(req.data.game_nama);
					$('.team_alias').html(req.data.alias);
					html = '';
					$.each(req.data.member, function(index,obj) {
						html += '\
							<li>\
								<a href="<?php echo base_url('Admin/user_details/') ?>'+obj.id+'" style="text-decoration: none;" class="text-secondary">\
									'+obj.user_username+'\
								</a>\
							</li>'
					});
					$('.team_member').html(html);
				}
			})
		}

		show()

	})
</script>