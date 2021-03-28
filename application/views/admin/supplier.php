<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Supplier</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li> -->
						<a onclick="return confirm('Apakah anda yakin untuk menghapus semua data?')" href="<?= base_url() ?>/Supplier/hapus_semua" class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
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
					<button class="btn btn-primary btnTambahs" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus"></i> Tambah Data</button>
					<a href="<?= base_url() ?>/Supplier/print_pdf" class="btn btn-success float-right" target="blank"><i class="fa fa-file-pdf"></i> Cetak</a>
					<div class="card mt-1">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Supplier</th>
										<th style="width: 30%;">Alamat Supplier</th>
										<th>Telepon</th>
										<th>Keterangan</th>
										<th style="width: 9.1%; text-align: center;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($supplier as $suplier) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $suplier->nama_supplier ?></td>
											<td><?= $suplier->alamat_supplier ?></td>
											<td><?= $suplier->telepon ?></td>
											<td><?= $suplier->keterangan ?></td>
											<td style="text-align: center;">
												<a href="<?= base_url() ?>/Supplier/edit/<?= $suplier->id_supplier; ?>" class="btn btn-success btn-sm btnEdits" data-toggle="modal" data-target="#formModal" data-id="<?= $suplier->id_supplier; ?>"><i class="fa fa-edit"></i></a>
												<a onclick="return confirm('Apakah anda yakin untuk menghapus?')" href="<?= base_url() ?>/Supplier/hapus/<?= $suplier->id_supplier; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
					<h4 class="modal-title" id="formModalLabel">Input Supplier</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?> Supplier/tambah_aksi" method="POST" id="formResetData">
						<div class="form-group">
							<input type="hidden" id="id_supplier" name="id_supplier" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama Supplier</label>
							<input type="text" id="nama_supplier" name="nama_supplier" class="form-control">
						</div>
						<div class="form-group">
							<label>Alamat Supplier</label>
							<input type="text" id="alamat_supplier" name="alamat_supplier" class="form-control">
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="number" id="telepon" name="telepon" class="form-control">
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
