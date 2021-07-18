<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Laporan Stok Terjual</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li> -->
						<a href="<?= base_url() ?>/Stok_Terjual/print_pdf" class="btn btn-success float-right mt-4" target="blank"><i class="fa fa-file-pdf"></i> Cetak</a>
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
					<!-- <form action="<?= base_url() ?>Stok_Terjual/print_pdf" method="post" target="_blank">
						<div class="form-group">
							<label for="">Tanggal Awal</label>
							<input type="date" name="tanggal_awal" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Tanggal Akhir</label>
							<input type="date" name="tanggal_akhir" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Buka Laporan</button>
						</div>
					</form> -->

					<div class="card">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center;">
										<th>No.</th>
										<th>Tanggal</th>
										<th>Nama Barang</th>
										<!-- <th>Harga Jual</th> -->
										<th>Jumlah Terjual</th>
										<!-- <th>Sub Total</th> -->
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($barang_terjual_a as $terjual) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td style="text-align: center;"><?= $terjual->tanggal_penjualan ?></td>
											<td><?= $terjual->nama_barang ?></td>
											<!-- <td style="text-align: right;"><?= number_format($terjual->harga_jual, 0, ',', '.') ?></td> -->
											<td style="text-align: center;"><?= $terjual->jumlah_barang_terjual ?> </td>
											<!-- <td style="text-align: right;"><?= number_format($terjual->sub_total, 0, ',', '.') ?></td> -->
										</tr>
									<?php endforeach; ?>
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
