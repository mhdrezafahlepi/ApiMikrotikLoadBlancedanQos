<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>Konfigurasi Routes</h3>
			<div class="card-body">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-routes">
					Add Routes
				</button>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Gateway</th>
									<th>Check Gateway</th>
									<th>Distance</th>
									<th>Routing Mark</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($routes as $data) {

									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['gateway']; ?></th>
										<th><?= $data['check-gateway']; ?></th>
										<th><?= $data['distance']; ?></th>
										<th><?= $data['routing-mark']; ?></th>
										<th>
											<a href="<?= site_url('Failover/delRoutes/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Routes <?= $data['gateway']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
										</th>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal-add-routes" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Add Routes</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('Failover/addRoutes') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="gateway">Gateway</label>
							<input type="text" name="gateway" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="check-gateway">Check Gateway</label>
							<select name="check-gateway" id="check-gateway" class="form-control">
								<option value="">all</option>
								<option value="ping">ping</option>
							</select>
						</div>
						<div class="form-group">
							<label for="distance">Distance</label>
							<select name="distance" id="distance" class="form-control">
								<option value="">all</option>
								<option value="1">1</option>
							</select>
						</div>
						<div class="form-group">
							<label for="routing-mark">Routing Mark</label>
							<select name="routing-mark" id="routing-mark" class="form-control">
								<option value="">all</option>
								<option value="KE-ISP-1">KE-ISP-1</option>
								<option value="KE-ISP-2">KE-ISP-2</option>
							</select>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-outline-light">Save</button>

					</div>
				</form>


			</div>
		</div>
	</div>