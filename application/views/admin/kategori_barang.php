<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Kategori Barang</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item active">Kategori Barang</li> -->
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
					<button class="btn btn-primary btnTambah" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus"></i> Tambah Data</button>
					<a onclick="return confirm('Apakah anda yakin untuk menghapus semua data?')" href="<?= base_url() ?>/Kategori_Barang/hapus_semua" class="btn btn-danger float-right"><i class="fas fa-trash-alt"></i> Hapus Semua</a>
					<div class="card mt-1">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Kategori</th>
										<th style="width: 15%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($kategori_barang as $ktg) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $ktg->nama_kategori ?></td>
											<td>
												<a href="<?= base_url() ?>/Kategori_Barang/edit/<?= $ktg->id_kategori; ?>" class="btn btn-success btn-sm btnEdit" data-toggle="modal" data-target="#formModal" data-id="<?= $ktg->id_kategori; ?>"><i class="fa fa-edit"></i></a>
												<a onclick="return confirm('Apakah anda yakin untuk menghapus?')" href="<?= base_url() ?>/Kategori_Barang/hapus/<?= $ktg->id_kategori; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
					<h4 class="modal-title" id="formModalLabel">Input Kategori view</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Kategori_Barang/tambah_aksi" method="POST" id="formResetData">
						<div class="form-group">
							<input type="hidden" id="id_kategori" name="id_kategori" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama Kategori</label>
							<input type="text" id="nama_kategori" name="nama_kategori" class="form-control">
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
