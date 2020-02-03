<script>
	$(document).ready(function() {

		function info() {
			$.ajax({
				url : "<?php echo base_url('api/Turnamen/info') ?>",
				method : "POST",
				data : {
					turnamen_id : <?php echo $this->session->userdata('turnamen_id'); ?>
				},
				async : true,
				success : function(req) {
					$('b.game_nama').html(req.data.game_nama);
					// venue
					if (req.data.venue == '1') {
						venue = "online";
					} else {
						venue = "offline";
					}

					if (req.data.entry == '1') {
						entry = "Free";
					} else {
						entry = "Group / Squad";
					}

					$('div.foto').html('\
						<img src="<?php echo base_url('api/img/turnamen/'); ?>'+req.data.image+'" alt="'+req.data.nama+'.jpeg" style="height: 300px; max-width: 100%">\
						');

					$('div.keterangan').html('\
						<div class="badge badge-danger" style="padding: 10px">Featured</div>\
						<div class="badge badge-success" style="padding: 10px">Series</div>\
						<hr>\
						<h3>'+req.data.nama+'</h3>\
						<small>'+req.data.date_start+' s/d '+req.data.date_end+'</small><br>\
						<big><strong>'+entry+'</strong></big>\
						<hr>\
						<table class="table table-sm">\
							<tr>\
								<th>Hosted by</th>\
								<td>'+req.data.komunitas_id+'</td>\
							</tr>\
							<tr>\
								<th>Community</th>\
								<td>'+req.data.komunitas_id+'</td>\
							</tr>\
							<tr>\
								<th>Tournament mode</th>\
								<td>'+req.data.mode+'</td>\
							</tr>\
							<tr>\
								<th>Venue</th>\
								<td>'+venue+'</td>\
							</tr>\
						</table>\
						');

					$('div.hadiah').html('\
						<h1>Rp. '+req.data.hadiah+'</h1>\
						')

					$('p.aturan').html(req.data.rules);
					$('p.how-join').html(req.data.how_to_join);
				}
			})
		}
		info();
	})
</script>