<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>
				Pool
			</h3>
			<div class="card-body">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-pool">
					Add Pool
				</button>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Ranges</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($pool as $data) {

									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['name']; ?></th>
										<th><?= $data['ranges']; ?></th>
										<th>
											<a href="<?= site_url('Internet/delPool/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Dhcp Server <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
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
	<div class="modal fade" id="modal-add-pool" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Add Pool
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('Internet/addPool') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="name">Ranges</label>
							<input type="text" name="ranges" class="form-control" autocomplete="off" required>
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