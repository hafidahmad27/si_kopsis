<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		&nbsp;<img src="<?= base_url() ?>assets/dist/img/logo_kopsis.PNG" style="width: 15%;" class="rounded-circle">
		<span class="brand-text font-weight-light bold">&nbsp;<strong>Koperasi Siswa</strong></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			&nbsp;
			&nbsp;
			<i class="fas fa-user-circle fa-2x"></i>

			<div class="info">
				<a href="#" class="d-block text-white"><?= $this->session->userdata('username'); ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<?php $uri = $this->uri->segment(1) ?>
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
				with font-awesome or any other icon font library -->
				<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'pimpinan') : ?>
					<li class="nav-item">
						<a href="<?= site_url(); ?>dashboard" class="nav-link <?php echo $uri == 'dashboard' ? 'active' : 'no' ?>">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'gudang') : ?>
					<li class="nav-item">
						<a href="<?= site_url(); ?>supplier" class="nav-link <?php echo $uri == 'supplier' ? 'active' : 'no' ?>">
							<i class="nav-icon fas fa-truck"></i>
							<p>
								Supplier
							</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('level') == 'admin') : ?>
					<li class="nav-item <?php echo $uri == 'barang' || $uri == 'kategori_barang' ? 'menu-open' : 'no' ?>">
						<a href="#" class="nav-link <?php echo $uri == 'barang' || $uri == 'kategori_barang' ? 'active' : 'no' ?>">
							<i class="nav-icon fas fa-box"></i>
							<p>
								Barang
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?= site_url(); ?>kategori_barang" class="nav-link <?php echo $uri == 'kategori_barang' ? 'active' : 'no' ?>">&nbsp; &nbsp;
									<i class="fas fa-tags nav-icon"></i>
									<p>Kategori Barang</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= site_url(); ?>barang" class="nav-link <?php echo $uri == 'barang' ? 'active' : 'no' ?>">&nbsp; &nbsp;
									<i class="fas fa-tag nav-icon"></i>
									<p>Barang</p>
								</a>
							</li>
							<li class="nav-item">
								<!-- <a href="pages/tables/jsgrid.html" class="nav-link">
							<i class="far fa-tachometer nav-icon"></i>
							<p>jsGrid</p>
						</a> -->
							</li>
						</ul>
					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'gudang' || $this->session->userdata('level') == 'pimpinan') : ?>
					<li class="nav-item <?php echo $uri == 'stok_masuk' || $uri == 'stok_keluar' || $uri == 'stok_terjual' ? 'menu-open' : 'no' ?>">
						<a href="#" class="nav-link <?php echo $uri == 'stok_masuk' || $uri == 'stok_keluar' || $uri == 'stok_terjual' ? 'active' : 'no' ?>">
							<i class="nav-icon fas fa-table"></i>
							<p>
								Stok
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'gudang') : ?>
								<li class="nav-item">
									<a href="<?= site_url(); ?>stok_masuk" class="nav-link <?php echo $uri == 'stok_masuk' ? 'active' : 'no' ?>">&nbsp; &nbsp;
										<i class="fas fa-caret-square-up nav-icon"></i>
										<p>Stok Masuk</p>
									</a>
								</li>
							<?php endif; ?>
							<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'gudang') : ?>
								<li class="nav-item">
									<a href="<?= site_url(); ?>stok_keluar" class="nav-link <?php echo $uri == 'stok_keluar' ? 'active' : 'no' ?>">&nbsp; &nbsp;
										<i class="fas fa-caret-square-down nav-icon"></i>
										<p>Stok Keluar</p>
									</a>
								</li>
							<?php endif; ?>
							<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'pimpinan') : ?>
								<li class="nav-item">
									<a href="<?= site_url(); ?>stok_terjual" class="nav-link <?php echo $uri == 'stok_terjual' ? 'active' : 'no' ?>">&nbsp; &nbsp;
										<i class="fas fa-check-square nav-icon"></i>
										<p>Stok Terjual</p>
									</a>
								</li>
							<?php endif; ?>

						</ul>
					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('level') == 'kasir' || $this->session->userdata('level') == 'admin') : ?>
					<li class="nav-item">
						<a href="<?= site_url(); ?>penjualan" class="nav-link <?php echo $uri == 'penjualan' ? 'active' : 'no' ?>">
							<i class="fas fa-hand-holding-usd nav-icon"></i>
							<p>
								Transaksi Penjualan
							</p>
						</a>
					</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'kasir' || $this->session->userdata('level') == 'pimpinan') : ?>
					<li class="nav-item <?php echo $uri == 'laporan_penjualan' || $uri == 'laporan_keuntungan' ? 'menu-open' : 'no' ?>">
						<a href="#" class="nav-link <?php echo $uri == 'laporan_penjualan' || $uri == 'laporan_keuntungan' ? 'active' : 'no' ?>">
							<i class="nav-icon fas fa-book"></i>
							<p>
								Laporan
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'kasir') : ?>
								<li class="nav-item">
									<a href="<?= site_url(); ?>laporan_penjualan" class="nav-link <?php echo $uri == 'laporan_penjualan' ? 'active' : 'no' ?>">&nbsp; &nbsp;
										<i class="fas fa-file-invoice-dollar nav-icon"></i>
										<p>
											Laporan Penjualan
										</p>
									</a>
								</li>
							<?php endif; ?>
							<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'pimpinan') : ?>
								<li class="nav-item">
									<a href="<?= site_url(); ?>laporan_keuntungan" class="nav-link <?php echo $uri == 'laporan_keuntungan' ? 'active' : 'no' ?>">&nbsp; &nbsp;
										<i class="fas fa-dollar-sign nav-icon"></i>
										<p>
											Laporan Keuntungan
										</p>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</li>
				<?php endif; ?>

				<!-- <li class="nav-item"> -->
				<!-- <a href="pages/tables/jsgrid.html" class="nav-link">
					<i class="far fa-tachometer nav-icon"></i>
					<p>jsGrid</p>
				</a> -->
				<!-- </li>
			</ul>
		</li> -->
				<?php if ($this->session->userdata('level') == 'admin') : ?>
					<li class="nav-item">
						<a href="<?= site_url(); ?>user" class="nav-link <?php echo $uri == 'user' ? 'active' : 'no' ?>">
							<i class="nav-icon fas fa-user-plus"></i>
							<p>
								User
							</p>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
