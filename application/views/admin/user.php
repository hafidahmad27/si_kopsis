<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data User</h1>
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
					<button class="btn btn-primary btnTambahus" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus"></i> Tambah Data</button>
					<div class="card mt-1">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama User</th>
										<th>Username</th>
										<th>Password</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($user as $users) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $users->nama_user ?></td>
											<td><?= $users->username ?></td>
											<td><?= $users->password ?></td>
											<td>
												<a href="<?= base_url() ?>/User/edit/<?= $users->id_user; ?>" class="btn btn-success btn-sm btnEditus" data-toggle="modal" data-target="#formModal" data-id="<?= $users->id_user; ?>"><i class="fa fa-edit"></i></a>
												<a onclick="return confirm('Apakah anda yakin untuk menghapus?')" href="<?= base_url() ?>/User/hapus/<?= $users->id_user; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
					<h4 class="modal-title" id="formModalLabel">Input User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?> User/tambah_aksi" method="POST" id="formResetData">
						<div class="form-group">
							<input type="hidden" id="id_user" name="id_user" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama User</label>
							<input type="text" id="nama_user" name="nama_user" class="form-control">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" id="username" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" id="password" name="password" class="form-control">
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
