<?php $game = ['Dota 2',
		   	'Counter-Strike: Global Offensive',
			'Mobile Legends: Bang Bang',
			'Arena of Valor',
			'Player Unknown Battleground',
			'Point Blank',
			'Player Unknown Battleground Mobile',
			'Apex Legends',
			'Free Fire',
			'Fifa 20',
			'Dota Underlords',
			'Call of Duty Mobile',
			'Cheese Rush',
			'Lets Get Rich',
			'Overwatch',
			'Player Unknown Battleground Lite'
		   ] ;
?>


<div class="main">
	<div class="container mt-5">
		<h2 class="p-3">Games</h2>
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-header text-center">Add Game</div>
					<div class="card-body">
						<button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#addGame"><span class="fa fa-plus"></span></button>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card rounded-lg">
					<div class="card-body">
						<table id="example" class="table table-striped table-borderless table-hover table-dark table-sm" style="width:100%">
							<thead class="thead-primary">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="table-striped">
								<?php $no=1; foreach($game as $key){ ?>

								<tr>
									<td><?= $no++ ?></td>
									<td><?= $key ?></td>
									<td><a href="<?= base_url('Admin/game_details') ?>" class="d-block mr-3 text-right">Details</a></td>
								</tr>

								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--MOdal-->
<div class="modal fade" id="addGame" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content rounded-0">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add Game</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" class="form mt-3">
					<div class="form-group">
						<input type="text" placeholder="Name" class="form-control w-75 d-block mx-auto bg-dark border-0 text-white  rounded-0 ">
					</div>
					<div class="form-group">
						<div class="input-group w-75 mx-auto">
							<input type="text" placeholder="Roles in Game" class="form-control d-block  bg-dark border-0 text-white rounded-0" id="role">
							<div class="input-group-append">
								<div class="input-group-button">
									<span class="btn btn-secondary rounded-0" onclick="addRole()" type="button"><span class="fa fa-plus"></span></span>
								</div>
							</div>
						</div>
						<ul id="roleList" class="mt-2"></ul>
					</div>
					<div class="custom-file">
						<input type="file" multiple class="custom-file-input " multiple id="customFile">
						<label class="custom-file-label bg-dark w-75 border-0 text-white d-block mx-auto" for="customFile">Image for game</label>
					</div>
					<button type="submit" class="d-block btn btn-primary ml-auto mt-5">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!--end MOdal-->
