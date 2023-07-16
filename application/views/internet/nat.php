<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>Konfigurasi Nat</h3>
			<div class="card-body">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-queues">
					Add Nat
				</button>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Chain</th>
									<th>Action</th>
									<th>Out Interface</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($nat as $data) {

									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['chain']; ?></th>
										<th><?= $data['action']; ?></th>
										<th><?= $data['out-interface']; ?></th>

										<th>
											<a href="<?= site_url('Internet/delNat/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Nat <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
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
	<div class="modal fade" id="modal-add-queues" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Add Nat</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= site_url('Internet/addNat') ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="chain">Chain</label>
							<select name="chain" id="chain" class="form-control">
								<option value="">all</option>
								<option value="srcnat">srcnat</option>
							</select>
						</div>
						<div class="form-group">
							<label for="action">Action</label>
							<select name="action" id="action" class="form-control">
								<option value="">all</option>
								<option value="masquerad">masquerad</option>
							</select>
						</div>
						<div class="form-group">
							<label for="out-interface">Out Interface</label>
							<select name="out-interface" id="out-interface" class="form-control">
								<option value="">all</option>
								<option value="WAN1">WAN1</option>
								<option value="WAN2">WAN2</option>
							</select>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-outline-light">Save</button>
						</div>
				</form>
			</div>
			<!-- /.modal-content -->


























		</div>
		<!-- /.modal-dialog -->
	</div>