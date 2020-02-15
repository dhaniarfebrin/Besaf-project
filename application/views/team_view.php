<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<h3>TEAM</h3>
	</div>

	<!-- END: Subheader -->
	<div class="m-content" style="background: none">
		<div class="row">
			<div class="col-md-5">
				<div class="m-portlet m-portlet--mobile" align="center">
					<div class="m-portlet__body">
						<img src="" class="image-team" style="width: 100%">
						<h3 class="nama-team mt-4">Nama Team</h3>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="m-portlet m-portlet--mobile">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									Presentasi
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<canvas></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="m-portlet m-portlet--mobile">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									Member(s) Team
								</h3>
							</div>
						</div>
						<div class="m-portlet__tools" style="margin-top: 13px">
							<button class="btn btn-primary" data-toggle="modal" data-target="#tambah" type="button">
								<i class="fa fa-plus"></i>
								Member baru
							</button>
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="pesan"></div>
						<table class="table table-hover data-member">
							<thead>
								<tr>
									<th>No.</th>
									<th>Username</th>
									<th>Image</th>
									<th>Role</th>
									<th style="width: 15%">Aksi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Tambah Member</h3>
				<button class="close" data-dismiss="modal" type="button"></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="input-group">
						<input type="search" class="form-control cari-member" placeholder="Cari Member...">
					</div>
				</div>
				<div class="form-group">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th></th>
								<th>Username</th>
								<th align="right">Aksi</th>
							</tr>
						</thead>
						<tbody class="member-baru">
							<tr><td colspan="4" align="center">Ketik beberapa kata</td></tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal" type="button">Selesai</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="pesan-hapus"></div>
			<form class="form-hapus">
				<div class="modal-body" align="center">
					<input type="hidden" class="id-kick-member">
					<i class="fa fa-trash text-danger mb-3" style="font-size: 90px"></i>
					<p style="font-size: 30px;">Hapus<br>member ini ?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" type="button">Batal</button>
					<button class="btn btn-primary" type="submit">Oke</button>
				</div>
			</form>
		</div>
	</div>
</div>