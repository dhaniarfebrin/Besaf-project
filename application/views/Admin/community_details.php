<div class="main">
	<div class="container mt-5">
		<h2>Community Details</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="card-image">
							<div class="pt-3 image-thumbnail">
								<img src="" style="width: 125px" class="img komunitas_foto">
							</div>
						</div>
						<div class="mt-3 text-center">
							<h5 class="card-title text-center font-weight-bold">
								Community
							</h5>
							<div class="card-text text-secondary game">
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
										<td class="text-secondary nama_komunitas">Evos Esport</td>
									</tr>
									<tr>
										<th>Category</th>
										<td class="text-secondary kategori">Umum</td>
									</tr>
									<tr>
										<th>Member(s)</th>
										<td class="text-secondary"><ul class="text-secondary member"></ul></td>
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
		function community_details() {
			$.ajax({
				url : "<?php echo base_url('api/Community/details') ?>",
				method : "POST",
				data : {
					komunitas_id : '<?php echo $this->session->userdata('komunitas_id') ?>'
				},
				success : function(req) {
					console.log(req);
					$('img.komunitas_foto').attr('src','<?php echo base_url('api/img/komunitas/') ?>'+req.data.komunitas_foto);
					$('div.game').html(req.data.komunitas_game);
					$('td.nama_komunitas').html(req.data.komunitas_nama);
					$('td.kategori').html(req.data.komunitas_kategori+'2');
					member = '';
					$.each(req.data.komunitas_member,function(index,obj) {
						member += '<li>'+obj.user_username+'</li>'
						$('ul.member').html(member);
					})
				}
			})
		}
		community_details()
	})
</script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>
