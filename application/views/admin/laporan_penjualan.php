<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Laporan Penjualan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li> -->
						<a onclick="return confirm('Apakah anda yakin untuk menghapus semua data?')" href="<?= base_url() ?>/Laporan_Penjualan/hapus_semua" class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card mt-1">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center;">
										<th>No Penjualan</th>
										<th>Nama Kasir</th>
										<th>Tanggal Penjualan</th>
										<th>Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($all_penjualan as $penjualan) : ?>
										<tr>
											<td><?= $penjualan->no_penjualan ?></td>
											<td><?= $penjualan->nama_kasir ?></td>
											<td><?= $penjualan->tanggal_penjualan ?> Pukul <?= $penjualan->jam_penjualan ?></td>
											<td style="text-align: right;"><?= number_format($penjualan->total, 0, ',', '.') ?></td>
											<td style="text-align: center;">
												<a href="<?= base_url('laporan_penjualan/detail/' . $penjualan->no_penjualan) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
												<a onclick="return confirm('apakah anda yakin untuk menghapus?')" href="<?= base_url('laporan_penjualan/hapus/' . $penjualan->no_penjualan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
