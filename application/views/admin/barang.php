<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Barang</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li> -->
						<a onclick="return confirm('Apakah anda yakin untuk menghapus semua?')" href="<?= base_url() ?>/Barang/hapus_semua" class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
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
					<button class="btn btn-primary btnTambahb" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus"></i> Tambah Data</button>
					<a href="<?= base_url() ?>/Barang/print_pdf" class="btn btn-success float-right" target="blank"><i class="fa fa-file-pdf"></i> Cetak</a>
					<div class="card mt-1">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr style="text-align: center;">
										<th style="width: 5%;">No.</th>
										<th style="width: 13%;">Kode Barang</th>
										<th style="width: 15%;">Kategori</th>
										<th>Nama Barang</th>
										<th style="width: 20%;">Harga Jual</th>
										<th style="width: 9%;">Stok</th>
										<th style="width: 12%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($barang as $brg) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $brg->kode_barang ?></td>
											<td style="text-align: center;"><?= $brg->nama_kategori ?></td>
											<td><?= $brg->nama_barang ?></td>
											<td style="text-align: right;"><?= number_format($brg->harga_jual, 0, ',', '.') ?></td>
											<td style="text-align: right;"><?= $brg->stok_barang ?></td>
											<td style="text-align: center;">
												<a href="<?= base_url() ?>/Barang/edit/<?= $brg->kode_barang; ?>" class="btn btn-success btn-sm btnEditb" data-toggle="modal" data-target="#formModal" data-id="<?= $brg->kode_barang; ?>"><i class="fa fa-edit"></i></a>
												<a onclick="return confirm('Apakah anda yakin untuk menghapus?')" href="<?= base_url() ?>/Barang/hapus/<?= $brg->kode_barang; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
					<h4 class="modal-title" id="formModalLabel">Input Barang</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Barang/tambah_aksi" method="POST" id="formResetData">
						<div class="form-group">
							<label>Kode Barang</label>
							<input type="text" id="kode_barang" name="kode_barang" value="BRG<?= sprintf("%04s", $kode_barang) ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" id="nama_barang" name="nama_barang" class="form-control">
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<select id="id_kategori" name="id_kategori" class="form-control">
								<?php foreach ($kategori_barang as $ktg) : ?>
									<option value="<?= $ktg->id_kategori ?>"><?= $ktg->nama_kategori ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Harga Jual</label>
							<input type="text" id="harga_jual" name="harga_jual" maxlength="11" class="form-control">
						</div>
						<div class="form-group">
							<label>Stok Barang</label>
							<input type="number" id="stok_barang" name="stok_barang" class="form-control" min="0" readonly>
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
