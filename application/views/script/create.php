<script>
	$(document).ready(function() {

		$('textarea.rules').summernote({
			height: 200
		});
		
		$(document).on('change','input.foto-turnamen',function(e) {
			file = e.target.files[0];
			canvasResize(file,{
				width: 400,
	                height: 400,
	                crop: true,
	                quality: 100,
	                // rotate: 90,
	                callback : function(data) {
	                	$('input.foto_turnamen').val(data);
	                	$('img.foto_turnamen').attr('src',data);
	                }
			})
		});

		$(document).on('click','input.online',function() {
			$('input.venue').val('1')
		})

		$(document).on('click','input.offline',function() {
			$('input.venue').val('2')
		})

		$(document).on('click','input.free',function() {
			$('input.entry').val('1')
		})

		$(document).on('click','input.group',function() {
			$('input.entry').val('2')
		})

		$(document).on('submit','form.buat-turnamen',function() {
			nama = $('input.nama').val();
			game_id = $('select.game_id').val();
			hadiah = $('input.hadiah').val();
			cookies = $('input.cookies').val();
			image = $('input.foto_turnamen').val();
			venue = $('input.venue').val();
			informasi = $('textarea.informasi').val();
			entry = $('input.entry').val();
			mode = $('select.mode').val();
			slots = $('input.slots').val();
			time = $('input.time').val();
			date_start = $('input.date_start').val();
			date_end = $('input.date_end').val();
			rules = $('textarea.rules').val();

			$.ajax({
				url : "<?php echo base_url('api/Turnamen/create'); ?>",
				method : "POST",
				data : {
					nama : nama,
					game_id : game_id,
					hadiah : hadiah,
					cookies : cookies,
					image : image,
					venue : venue,
					informasi : informasi,
					entry : entry,
					mode : mode,
					slots : slots,
					time : time,
					date_start : date_start,
					date_end : date_end,
					rules : rules,
					komunitas_id : <?php echo $this->session->userdata('komunitas_id'); ?>
				},
				success : function(req) {
					if (req.error==true) {
						notif('div.pesan','danger',req.message);
					} else {
						notif('div.pesan','success',req.message);
						window.location = "<?php echo base_url('Community/info/'.$this->session->userdata('komunitas_id')); ?>";
					}
				}
			})

			return false;
		});

		function notif(data,type,message) {
			$(data).html('\
				<div class="alert alert-'+type+'">\
					'+message+'\
					<button class="close" data-dismiss="alert" type="button"></button>\
				</div>\
				')
		}

	})

</script>