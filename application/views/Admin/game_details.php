<div class="main">
	<div class="container mt-5">
		<h2 class="p-2">Details</h2>
		<div class="card game_details">
			<div class="card-body">
				<div class="card-image">
					<img src="" class="img-thumbnail d-block mx-auto gambare_game" width="300px">
				</div>
				<div class="w-50 mt-5 mx-auto">
					<table class="table text-white table-borderless">
						<tr>
							<th>Name</th>
							<td class="game_name"></td>
						</tr>
						<th>Role Game</th>
						<td class="role_game"></td>
						<tr>
							<th>Was Created At</th>
							<td class="created_at"></td>
						</tr>
					</table>
				</div>
				<div class="d-block text-center mt-5 hapus-game">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal confirm delete game -->
<div class="modal fade hapusen_ae_wes" id="hapusen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Game</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" class="delete_game">
				<p>Are you sure to delete <b class="game-name"></b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary delete">Delete</button>
			</div>
		</div>
	</div>
</div>
<!-- end of Modal confirm delete game -->
<script src="<?= base_url() ?>assets/Admin/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/Admin/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url() ?>assets/Admin/js/myscript.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		/* Read game details */
		function Game_details() {
			$.ajax({
				url: "<?= base_url('api/Super_admin/Game_details'); ?>",
				method: "POST",
				data: {
					game_id: '<?php echo $this->session->userdata('game_id') ?>'
				},
				success: function(req) {
					$('img.gambare_game').attr('src', "<?php echo base_url('api/img/game/'); ?>" + req.data.game_image);
					$('td.game_name').html(req.data.game_name);
					$('td.created_at').html(req.data.created_at);
					data = req.data.role_name;
					html = '';
					for (i = 0; i < data.length; i++) {
						html += '\
						<ul>\
							<li>' + data[i].name + '</li>\
						</ul>\
						';
					}
					$('td.role_game').html(html);
					$('div.hapus-game').html('<button type="button" class="btn btn-secondary delete-game" data-toggle="modal" data-target="#hapusen" data-id="' + req.data.id + '" data-game_name="' + req.data.game_name + '">Hapus</button>')
				}
			})
		}
		Game_details()
		/* Delete Game */
		$(document).on('click', 'button.delete-game', function() {
			game_id = <?= $this->session->userdata('game_id'); ?>;
			game_name = $(this).data('game_name');
			$("input.delete_game").val(game_id);
			$("b.game-name").html(game_name)
		});
		$(document).on('click', 'button.delete', function() {
			game_id = $("input.delete_game").val();
			$.ajax({
				url: '<?= base_url('api/Super_admin/Delete_game'); ?>',
				method: 'POST',
				data: {
					id: game_id
				},
				success: function(req) {
					$("input.delete_game").val('');
					$("div#hapusen").modal('hide');
					window.location = '<?php echo base_url('Admin/game') ?>'
				}
			})
		});
	})
</script>