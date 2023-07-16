<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">

	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">

	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">


		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="<?= base_url('assets/template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>
		<nav class="main-header navbar navbar-expand navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('auth/logout') ?>" onclick="return confirm('Apakah Anda Yakin Akan Keluar ?');" role="button">
						<i class="fas fa-sign-out-alt"></i>
					</a>
				</li>
			</ul>
		</nav>
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="<?= basename('') ?>" class="brand-link">
				<i class="nav-icon fas fa-wifi"></i>
				<span class="brand-text font-weight-light">API Mikrotik Imigrasi</span>
			</a>
			<div class="sidebar">
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="<?= site_url('dashboard') ?>" class="nav-link <?= $title == 'Dashboard Mikweb' ? 'active' : '' ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									--MENU--
								</p>
							</a>
						</li>
						<li class="nav-item <?= $title == 'IP' | $title == 'IP' ? 'menu-open' : '' ?>">
							<a href="#" class="nav-link <?= $title == 'IP' | $title == 'IP' ? 'ipaddress' : '' ?>">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Internet
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('internet/dhcpclient') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>DHCP Client</p>
									</a>
								</li>
							</ul>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('internet/nat') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Nat</p>
									</a>
								</li>
							</ul>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('internet/ipaddress') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Ip Address</p>
									</a>
								</li>
							</ul>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('internet/pool') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Pool & Network</p>
									</a>
								</li>
							</ul>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('internet/dhcpserver') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>DHCP Server</p>
									</a>
								</li>
							</ul>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('internet/dns') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>DNS Server</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item <?= $title == 'IP' | $title == 'IP' ? 'menu-open' : '' ?>">
							<a href="#" class="nav-link <?= $title == 'IP' | $title == 'IP' ? 'ipaddress' : '' ?>">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Failover
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('failover/mangle') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Mangle</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= site_url('failover/routes') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Routes</p>
									</a>
								</li>

							</ul>
						</li>
						<li class="nav-item <?= $title == 'IP' | $title == 'IP' ? 'menu-open' : '' ?>">
							<a href="#" class="nav-link <?= $title == 'IP' | $title == 'IP' ? 'ipaddress' : '' ?>">
								<i class="nav-icon fas fa-users"></i>
								<p>
									QoS
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= site_url('qos/queues') ?>" class="nav-link <?= $title == 'Mangle' ? 'mangle' : '' ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Limit</p>
									</a>
								</li>
							</ul>
						</li>


					</ul>
				</nav>
			</div>
		</aside>
		<aside class="control-sidebar control-sidebar-dark">
	</div>
	<script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
	</script>
	<script src="<?= base_url('assets/template/') ?>dist/js/adminlte.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/raphael/raphael.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/chart.js/Chart.min.js"></script>
	<script src="<?= base_url('assets/temp
late/') ?>dist/js/demo.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url('assets/temp
late/') ?>plugins/datatables-responsive/js
/dataTables.responsive.min.js">
	</script>
	<script src="<?= base_url('assets/temp
late/') ?>plugins/datatables-responsive/js
/responsive.bootstrap4.min.js">
	</script>


	<script>
		$(function() {
			$('#dataTable').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>
</body>

</html>
<?php ini_set('display_errors', 'off'); ?>