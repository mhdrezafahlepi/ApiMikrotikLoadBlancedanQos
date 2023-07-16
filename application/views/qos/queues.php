<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<h3>Konfigurasi Queues</h3>
			<div class="row">
				<div class="card-body">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-add-mangle">
						Active Queues
					</button>
				</div>
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-borderes" id="dataTable" width="100%" collspacing="0">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Target</th>
									<th>Max Limit (Upload & Download)</th>
									<th>Enable</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $no = 0;
								foreach ($queues as $data) {

									$no++;
								?>
									<tr>
										<?php $id = str_replace('*', '', $data['.id']) ?>
										<th><?= $no ?> </th>
										<th><?= $data['name']; ?></th>
										<th><?= $data['target']; ?></th>
										<th><?= $data['max-limit']; ?></th>
										<th>
											<a href="<?= site_url('Qos/disQueues/' . $id) ?>" onclick="return confirm('Apakah Anda Ingin Menonaktifkan Queues <?= $data['name']; ?> ?')"><i class="fa fa-check-circle" style="color:red"></i></a>
											<a href="<?= site_url('Qos/enaQueues/' . $id) ?>" onclick="return confirm('Apakah Anda Ingin Mengaktifkan Queues <?= $data['name']; ?> ?')"><i class="fa fa-check-circle" style="color:green"></i></a>
										</th>
										<th>
											<a href="<?= site_url('qos/delQueues/' . $id) ?>" onclick="return confirm('Apakah Anda Yakin Akan Hapus Dhcp Server <?= $data['name']; ?> ?')"><i class="fa fa-trash" style="color:red"></i></a>
										</th>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="modal fade" id="modal-add-mangle" style="display: none;" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content bg-secondary">
								<div class="modal-header">
									<h4 class="modal-title">Actifkan Konfigurasi Limit</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<form>
									<div class="modal-footer justify-content-between">
										<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
										<a href="<?= site_url('Qos/addQueues/' . $id) ?>" onclick="return confirm('Anda Akan Menambahkan Konfigurasi QoS Limit Untuk Ether 2 ?')"><i class="fa fa-check" style="color:yellow"></i>
										</a>
									</div>
								</form>
							</div>




						</div>




					</div>
				</div>
			</div>
		</div>
	</div>