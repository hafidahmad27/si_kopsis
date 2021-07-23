<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Koperasi Siswa "Pangestu Pambudi"</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="grafik()">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- <li class="nav-item">
					<a class="nav-link" href="#" role="button">
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Dark Mode</label>
						</div>
					</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
						<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<!-- <a href="<?php echo site_url('/prosesLogout') ?>" class="nav-link" data-toggle="dropdown">
							<i class="fas fa-sign-out-alt"></i> Logout
						</a> -->
						<a href="<?php echo site_url('auth/logout') ?>" class="btn btn-info btnTambahsin">
							<i class="fa fa-sign-out-alt"></i>
							Logout
						</a>
					</li>
				</ul>
			</ul>
		</nav>
		<!-- /.navbar -->
