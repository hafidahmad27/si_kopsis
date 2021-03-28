<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Detail Penjualan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li> -->
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
					<div class="card shadow">
						<div class="hilangkan card-header"><strong>Detail Penjualan - <?= $penjualan->no_penjualan ?></strong>
							<div class="float-right">
								<a href="<?= base_url('laporan_penjualan/export_detail/' . $penjualan->no_penjualan) ?>" class="btn btn-danger btn-sm" target="blank"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<a href="<?= base_url('laporan_penjualan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<table class="table table-borderless">
										<tr>
											<td><strong>No Penjualan</strong></td>
											<td>:</td>
											<td><?= $penjualan->no_penjualan ?></td>
										</tr>
										<tr>
											<td><strong>Nama Kasir</strong></td>
											<td>:</td>
											<td><?= $penjualan->nama_kasir ?></td>
										</tr>
										<tr>
											<td><strong>Waktu Penjualan</strong></td>
											<td>:</td>
											<td><?= $penjualan->tanggal_penjualan ?> - <?= $penjualan->jam_penjualan ?></td>
										</tr>
									</table>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered">
										<thead>
											<tr style="text-align: center;">
												<td style="width: 5%;"><strong>No</strong></td>
												<td style="width: 25%;"><strong>Nama Barang</strong></td>
												<td style="width: 11%;"><strong>Harga Jual</strong></td>
												<td style="width: 7%;"><strong>Jumlah</strong></td>
												<td style="width: 11%;"><strong>Sub Total</strong></td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_detail_penjualan as $detail_penjualan) : ?>
												<tr>
													<td style="text-align: center;"><?= $no++ ?></td>
													<td><?= $detail_penjualan->nama_barang ?></td>
													<td style="text-align: right;"><?= number_format($detail_penjualan->harga_jual, 0, ',', '.') ?></td>
													<td style="text-align: center;"><?= $detail_penjualan->jumlah_barang ?> </td>
													<td style="text-align: right;"><?= number_format($detail_penjualan->sub_total, 0, ',', '.') ?></td>
												</tr>
											<?php endforeach ?>
										</tbody>
										<tfoot>
											<tr style="text-align: right;">
												<td colspan="4" align="right"><strong>Total : </strong></td>
												<td><strong> <?= number_format($penjualan->total, 0, ',', '.') ?></strong></td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
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
