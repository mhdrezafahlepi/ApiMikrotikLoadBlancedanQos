<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>Konfigurasi Mangle</h3>
			<div class="card-body">
				<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-mangle">
					Active Mangle
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
									<th>In Interface</th>
									<th>Connection Mark</th>
									<th>Per Connection Classifier</th>
									<th>Action</th>
									<th>New Connection Mark</th>
									<th>New Routing Mark</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($mangle as $data) {

									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['chain']; ?></th>
										<th><?= $data['in-interface']; ?></th>
										<th><?= $data['connection-mark']; ?></th>
										<th><?= $data['per-connection-classifier']; ?></th>
										<th><?= $data['action']; ?></th>
										<th><?= $data['new-connection-mark']; ?></th>
										<th><?= $data['new-routing-mark']; ?></th>
										<th>
											<a href="<?= site_url('Failover/delMangle/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Mangle <?= $data['chain']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
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
	<div class="modal fade" id="modal-add-mangle" style="display: none;" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-secondary">
				<div class="modal-header">
					<h4 class="modal-title">Actifkan konfigurasi Failover</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
						<a href="<?= site_url('Failover/addMangle/' . $id) ?>" onclick="return confirm('Anda Akan Menambahkan Konfigurasi Mangle Untuk Failover ?')"><i class="fa fa-check" style="color:yellow"></i>
						</a>
					</div>
				</form>
			</div>
		</div>