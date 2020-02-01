
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<h3>COMMUNITIES</h3>
	</div>
		<div class="message"></div>

	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							My Communitiy
						</h3>
					</div>
				</div>
			</div>
			<div class="m-portlet__body my-community">
				<div align="center">
					<big>Memuat...</big>
				</div>
			</div>
		</div>
		<button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#buat">
			<i class="fa fa-plus"></i>
			Buat Komunitas
		</button>
		<div class="row mt-4" id="daftar-komunitas">
			<div class="col-md-12" align="center">
				<div class="m-spinner m-spinner--danger m-spinner--lg"></div>
				<div class="m-spinner m-spinner--warning m-spinner--lg"></div>
				<div class="m-spinner m-spinner--success m-spinner--lg"></div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="buat">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Buat Komunitas</h3>
				<button type="button" class="close" data-dismiss="modal">x</button>
			</div>
			<form id="create" action="">
				<div class="modal-body">
					<div class="pesan-tambah"></div>
					<div class="form-group">
						<label for="">Nama Komunitas</label>
						<input type="text" class="form-control nama">
					</div>
					<div class="form-group">
						<label for="">Deskripsi</label>
						<textarea rows="3" class="form-control deskripsi" style="resize: none"></textarea>
					</div>
					<div class="form-group">
						<label for="">Kategori : </label>
						<select class="form-control kategori">
							<option value=""></option>
							<option value="">Sekolah</option>
							<option value="">Belum Diketahui</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Pilihan Game : </label>
						<select class="form-control game_id">
							<option value=""></option>
							<?php  
							for ($no=1; $no <= 10; $no++) {
							?>
							<option value="">Produk <?php echo $no ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Nomor Identitas</label>
						<input type="text" class="form-control nomor_identitas" placeholder="KTP, SIM, Passpor">
					</div>
					<div class="form-group">
						<label for="">Foto Identitas</label>
						<input type="file" class="form-control foto_identitas" id="foto_identitas">
					</div>
					<div class="form-group">
						<label for="">No. Telepon</label>
						<input type="text" class="form-control nomor_telpon">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>