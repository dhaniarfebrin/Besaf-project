
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<h3>COMMUNITIES</h3>
	</div>
		<div class="message container">
		</div>

	<!-- END: Subheader -->
	<div class="m-content">
		<div class="pesan"></div>
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
			<div class="m-portlet__body">
				<div class="my-community row">
				</div>
				<div class="collapse" id="selengkapnya">
					<div class="mt-3 my-community-selengkapnya row">
					</div>
				</div>
				<div align="center">
					<a href="#" data-toggle="collapse" data-target="#selengkapnya">
						<b class="text-danger">Selengkapnya <i class="fa fa-angle-down"></i></b>
					</a>
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
			<form class="buat-komunitas">
				<div class="modal-body">
					<div class="pesan-tambah"></div>
					<div class="form-group m-form__group">
						<label>Nama</label>
						<input type="text" class="form-control nama m-input m-input--air m-input--pill" placeholder="Nama Komunitas">
					</div>
					<div class="form-group m-form__group">
						<label>Deskripsi</label>
						<textarea rows="3" class="form-control deskripsi m-input m-input--air m-input--pill" style="resize: none" placeholder="Deskripsi Komunitas"></textarea>
					</div>
					<div class="form-group m-form__group">
						<label>Kategori : </label>
						<select class="form-control kategori m-input m-input--air m-input--pill">
							<option value=""></option>
							<option value="1">Sekolah</option>
							<option value="2">Belum Diketahui</option>
						</select>
					</div>
					<div class="form-group m-form__group">
						<label for="">Pilihan Game : </label>
						<select class="form-control pilihan-komunitas-game m-input m-input--air m-input--pill">
						</select>
					</div>
					<div class="form-group m-form__group">
						<label>Nomor Identitas</label>
						<input type="text" class="form-control nomor_identitas m-input m-input--air m-input--pill" placeholder="KTP, SIM, Passpor">
					</div>
					<div class="form-group m-form__group">
						<label for="">Foto Identitas</label>
						<div class="custom-file shadow-sm">
						  <input type="file" class="custom-file-input file" id="customFile" multiple>
						  <label class="custom-file-label label-file" for="customFile">Choose file</label>
						</div>
						<input type="hidden" class="foto_identitas">
					</div>
					<div class="form-group m-form__group">
						<div class="shadow-sm" style="height: 250px; background: #C9C9C9" align="center">
							<img class="foto_identitas rounded" style="padding: 10px; height: 100%;">
						</div>
					</div>
					<div class="form-group m-form__group">
						<label for="">No. Telepon</label>
						<input type="text" class="form-control nomor_telpon m-input m-input--air m-input--pill" placeholder="Nomor telepon">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>