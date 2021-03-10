<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Stok Keluar</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li> -->
						<a onclick="return confirm('Apakah anda yakin untuk menghapus semua data?')" href="<?= base_url() ?>/Stok_Keluar/hapus_semua" class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
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
					<button class="btn btn-primary btnTambahsout" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus"></i> Tambah Data</button>
					<a href="<?= base_url() ?>/Stok_Keluar/print_pdf" class="btn btn-success float-right" target="blank"><i class="fa fa-file-pdf"></i> Cetak</a>
					<div class="card mt-1">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th style="width: 5%;">No</th>
										<th style="width: 15%;">Tgl Keluar</th>
										<th style="width: 12%;">Jam</th>
										<th>Nama Barang</th>
										<th>Jumlah</th>
										<th>Nama Supplier</th>
										<th>Keterangan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($stok_keluar as $brgKeluar) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $brgKeluar->tanggal_stok_keluar ?></td>
											<td><?= $brgKeluar->jam_stok_keluar ?></td>
											<td><?= $brgKeluar->nama_barang ?></td>
											<td style="text-align: right;"><?= $brgKeluar->jumlah_stok_keluar ?></td>
											<td style="text-align: center;"><?= $brgKeluar->nama_supplier ?></td>
											<td><?= $brgKeluar->keterangan ?></td>
											<td>
												<!-- <a href="<?= base_url() ?>/Stok_Keluar/edit/<?= $brgKeluar->id_stok_keluar; ?>" class="btn btn-success btn-sm btnEditsout" data-toggle="modal" data-target="#formModal" data-id="<?= $brgKeluar->id_stok_keluar; ?>"><i class="fa fa-edit"></i></a> -->
												<a onclick="return confirm('Apakah anda yakin untuk menghapus?')" href="<?= base_url() ?>/Stok_Keluar/hapus/<?= $brgKeluar->id_stok_keluar; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
					<h4 class="modal-title" id="formModalLabel">Input Stok Keluar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Stok_Keluar/tambah_aksi" method="POST" id="formResetData">
						<div class="form-group">
							<input type="hidden" id="id_stok_keluar" name="id_stok_keluar" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Keluar</label>
							<input type="text" id="tanggal_stok_keluar" name="tanggal_stok_keluar" value="<?= date('d/m/Y') ?>" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Jam Keluar</label>
							<input type="text" id="jam_stok_keluar" name="jam_stok_keluar" value="<?= date('H:i:s') ?>" class="form-control" readonly>
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
							<input type="number" id="jumlah_stok_keluar" name="jumlah_stok_keluar" class="form-control" min="0">
						</div>
						<div class="form-group">
							<label>Nama Supplier</label>
							<select id="id_supplier" name="id_supplier" class="form-control">
								<?php foreach ($supplier as $suplier) : ?>
									<option value="<?= $suplier->id_supplier ?>"><?= $suplier->nama_supplier ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" id="keterangan" name="keterangan" class="form-control">
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
