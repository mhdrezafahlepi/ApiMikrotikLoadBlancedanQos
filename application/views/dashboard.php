<div class="content-wrapper mt-5">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">CPU Load</span>
							<span class="info-box-number">
								<?= $cpu; ?>
								<small>%</small>
							</span>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('internet/dhcpclient') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-success elevation-1"><i class="fas fa-plug"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">DHCP Client</span>
								<span class="info-box-number"><?= $dhcpclient; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('internet/nat') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-white elevation-1"><i class="fas fa-signal"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Nat</span>
								<span class="info-box-number"><?= $nat; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('internet/ipaddress') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Ip Address</span>
								<span class="info-box-number"><?= $ipaddress; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('internet/pool') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Pool & Network</span>
								<span class="info-box-number"><?= $pool; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('internet/dhcpserver') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-purple elevation-1"><i class="fas fa-users"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">DHCP Server</span>
								<span class="info-box-number"><?= $dhcp; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('internet/dns') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-light elevation-1"><i class="fas fa-address-book"></i></span>
							<div class="info-box-content">
								<span class="info-box-text">DNS Server</span>
								<span class="info-box-number"><?= $dns; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('failover/mangle') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tree"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Mangle</span>
								<span class="info-box-number"><?= $mangle; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('failover/routes') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tree"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Routes</span>
								<span class="info-box-number"><?= $route; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<a href="<?= site_url('qos/queues') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tree"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Limit</span>
								<span class="info-box-number"><?= $queues; ?></span>
							</div>
						</div>
					</a>
				</div>
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clock"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Uptime</span>
							<span class="info-box-number"><?= $uptime; ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
		</div>


		<select name="interface" id="interface">
			<?php foreach ($interface as $interface) { ?>
				<option value="<?= $interface['name'] ?>"><?= $interface['name'] ?></option>
			<?php } ?>
		</select>

		<div id="reloadtraffic"></div>

	</div>
</div>
</div>

<script>
	setInterval("reloadtraffic();", 1000);

	function reloadtraffic() {
		var interface = $('#interface').val();
		console.log(interface);
		$('#reloadtraffic').load('<?= site_url('dashboard/traffic') ?>') + interface;
	}
</script>