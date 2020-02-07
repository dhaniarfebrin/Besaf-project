<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">TURNAMEN BARU</h3>
			</div>
		</div>
	</div>

	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<form class="m-form m-form--fit m-form--label-align-right buat-turnamen">
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<div class="col-md-12 pesan"></div>
						<div class="col-md-7 mb-4">
							<label>Nama Turnamen</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill mb-4 nama" placeholder="Nama" autofocus>
							<label>Pilihan Game</label>
							<select class="form-control m-input m-input--air m-input--pill game_id" size="4">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="col-md-5">
							<label>Image Turnamen</label>
							<div class="custom-file">
							  <input type="file" class="custom-file-input foto-turnamen" id="customFile">
							  <label class="custom-file-label form-control m-input m-input--air foto_turnamen">Choose file</label>
							</div>
							<input type="hidden" class="foto_turnamen">
							<div class="shadow-sm bg-secondary shadow-sm rounded mt-3" style="height: 150px; width: 100%;" align="center">
									<img style="max-height: 100%; padding: 5px" src="" class="foto_turnamen">
							</div>	
						</div>
					</div>
					<div class="form-group m-form__group row">
						<div class="col">
							<label>Hadiah</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill hadiah" placeholder="Hadiah">
						</div>
						<div class="col">
							<label>Cookies</label>
							<input type="text" class="form-control m-input m-input--air m-input--pill cookies" placeholder="Cookies">
						</div>
					</div>
					<div class="form-group m-form__group">
						<label style="margin-right: 20%">Venue</label>
						<label class="m-radio">
							<input type="radio" name="venue" class="online"> Online
							<span></span>
						</label>
						<label class="m-radio ml-5">
							<input type="radio" name="venue" class="offline"> Offline
							<span></span>
						</label>
						<input type="hidden" class="venue">
					</div>
					<div class="form-group m-form__group">
						<label>Informasi</label>
						<textarea class="form-control m-input m-input--air m-input--pill informasi" rows="3" placeholder="Informasi"></textarea>
					</div>
					<div class="form-group m-form__group">
						<label style="margin-right: 20%">Entry</label>
						<label class="m-radio">
							<input type="radio" name="entry" class="free"> Free
							<span></span>
						</label>
						<label class="m-radio ml-5">
							<input type="radio" name="entry" class="group"> Group / Squad
							<span></span>
						</label>
						<input type="hidden" class="entry">
					</div>
					
					<div class="form-group m-form__group row">
						<div class="col-8">
							<label>Mode Turnamen</label>
							<select class="form-control m-input	input m-input--air mode">
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
						</div>
						<div class="col-4">
							<label>Jumlah Slots</label>
							<input type="text" class="form-control m-input m-input--air slots" placeholder="Slots">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<div class="col-2">
							<label>Time</label>
							<input type="time" class="form-control m-input m-input--air m-input--pill time">
						</div>
						<div class="col-5">
							<label for="">Date Start</label>
							<input type="date" class="form-control m-input m-input--air m-input--pill date_start">
						</div>
						<div class="col-5">
							<label for="">Date End</label>
							<input type="date" class="form-control m-input m-input--air m-input--pill date_end">
						</div>
					</div>
					<div class="form-group m-form__group">
						<label for="">Rules</label>
						<textarea class="rules"></textarea>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="button" class="btn btn-secondary">Cancel</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>