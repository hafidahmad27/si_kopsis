<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Stok Masuk</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li> -->
						<a onclick="return confirm('Apakah anda yakin untuk menghapus semua data?')" href="<?= base_url() ?>/Stok_Masuk/hapus_semua" class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
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
					<button class="btn btn-primary btnTambahsin" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus"></i> Tambah Data</button>
					<a href="<?= base_url() ?>/Stok_Masuk/print_pdf" class="btn btn-success float-right" target="blank"><i class="fa fa-file-pdf"></i> Cetak</a>
					<div class="card mt-1">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center;">
										<th style="width: 6%;">No</th>
										<th style="width: 11%;">Tgl&nbsp;Masuk</th>
										<th style="width: 7%;">Jam</th>
										<th style="width: 18%;">Nama Barang</th>
										<th style="width: 7%;">Jml</th>
										<th style="width: 11%;">Harga Beli</th>
										<th style="width: 14%;">Subtotal Harga Beli</th>
										<th style="width: 14%;">Nama Supplier</th>
										<th style="width: 1%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($stok_masuk as $brgMasuk) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $brgMasuk->tanggal_stok_masuk ?></td>
											<td><?= $brgMasuk->jam_stok_masuk ?></td>
											<td><?= $brgMasuk->nama_barang ?></td>
											<td style="text-align: center;"><?= $brgMasuk->jumlah_stok_masuk ?></td>
											<td style="text-align: right;"><?= number_format($brgMasuk->harga_beli, 0, ',', '.') ?></td>
											<td style="text-align: right;"><?= number_format($brgMasuk->total_harga_beli, 0, ',', '.') ?></td>
											<td style="text-align: center;"><?= $brgMasuk->nama_supplier ?></td>
											<td style="text-align: center;">
												<!-- <a href="<?= base_url() ?>/Stok_Masuk/edit/<?= $brgMasuk->id_stok_masuk; ?>" class="btn btn-success btn-sm btnEditsin" data-toggle="modal" data-target="#formModal" data-id="<?= $brgMasuk->id_stok_masuk; ?>"><i class="fa fa-edit"></i></a> -->
												<a onclick="return confirm('Apakah anda yakin untuk menghapus?')" href="<?= base_url() ?>/Stok_Masuk/hapus/<?= $brgMasuk->id_stok_masuk; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
											</td>
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
	<!-- Modal -->
	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="formModalLabel">Input Stok Masuk</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Stok_Masuk/tambah_aksi" method="POST" id="formResetData">
						<div class="form-group">
							<input type="hidden" id="id_stok_masuk" name="id_stok_masuk" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Tgl Masuk</label>
							<input type="text" id="tanggal_stok_masuk" name="tanggal_stok_masuk" value="<?= date('d/m/Y') ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Jam Masuk</label>
							<input type="text" id="jam_stok_masuk" name="jam_stok_masuk" value="<?= date('H:i:s') ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama Barang</label>
							<select id="id_barang" name="id_barang" class="form-control">
								<?php foreach ($barang as $brg) : ?>
									<option value="<?= $brg->id_barang ?>"><?= $brg->nama_barang ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type="number" id="jumlah_stok_masuk" name="jumlah_stok_masuk" class="form-control" min="0">
						</div>
						<div class="form-group">
							<label>Harga Beli</label>
							<input type="number" id="harga_beli" name="harga_beli" class="form-control" min="0">
						</div>
						<div class="form-group">
							<label>Subtotal Harga Beli</label>
							<input type="number" id="total_harga_beli" name="total_harga_beli" class=" form-control" min="0" readonly>
						</div>
						<div class="form-group">
							<label>Nama Supplier</label>
							<select id="id_supplier" name="id_supplier" class="form-control">
								<?php foreach ($supplier as $suplier) : ?>
									<option value="<?= $suplier->id_supplier ?>"><?= $suplier->nama_supplier ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="modal-footer">
							<button type="close" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->
</div>
<!-- /.content-wrapper -->
<!-- <script>
    $('input[name="total_harga_beli"]').val($('input[name="jumlah_stok_masuk"]').val() * $('input[name="harga_beli"]').val())
</script> -->
