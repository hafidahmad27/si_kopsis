<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Transaksi Penjualan</h1>
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
	<div id="content" data-url="<?= base_url('penjualan') ?>" class="ml-2 mr-2">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-sm-12">
									<form action="<?= base_url('penjualan/proses_tambah') ?>" id="form-tambah" method="POST">
										<div class="form-row">
											<div class="form-group col-2">
												<label>No. Penjualan</label>
												<input type="text" name="no_penjualan" value="TR<?= time() ?>" readonly class="form-control">
											</div>
											<div class="form-group col-3">
												<label>Nama Kasir</label>
												<input type="text" name="nama_kasir" value="<?= $this->session->userdata('username'); ?>" readonly class="form-control">
											</div>
											<div class="form-group col-2">
												<label>Tanggal</label>
												<input type="text" name="tanggal_penjualan" value="<?= date('Y/m/d') ?>" readonly class="form-control">
											</div>
											<div class="form-group col-2">
												<label>Jam</label>
												<input type="text" name="jam_penjualan" value="<?= date('H:i:s') ?>" readonly class="form-control">
											</div>
										</div>
										<hr>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="pilih_nama_barang">Nama Barang</label>
												<select name="pilih_nama_barang" id="pilih_nama_barang" class="form-control">
													<option value="">Pilih Barang</option>
													<?php foreach ($all_barang as $barang) : ?>
														<option value="<?= $barang->nama_barang ?>"><?= $barang->nama_barang ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<!-- <div class="form-group col-2">
                                                <label>Kode Barang</label>
                                                <input type="text" name="kode_barangj" value="" readonly class="form-control">
                                            </div> -->
											<div class="form-group col-2">
												<label>Harga Jual</label>
												<input type="text" name="harga_jualp" value="" readonly class="form-control">
											</div>
											<div class="form-group col-2">
												<label>Jumlah</label>
												<input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
											</div>
											<div class="form-group col-2">
												<label>Sub Total</label>
												<input type="number" name="sub_total" value="" class="form-control" readonly>
											</div>
											<div class="form-group col-1">
												<label for="">&nbsp;</label>
												<button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
											</div>
											<!-- <input type="hidden" name="satuan" value=""> -->
										</div>
										<div class="keranjang">
											<hr>
											<h5 style="font-weight: bold;">Detail Penjualan</h5>
											<table class="table table-bordered" id="keranjang">
												<thead>
													<tr>
														<th width="35%" style="text-align: center;">Nama Barang</th>
														<th width="11%">Harga Jual</th>
														<th width="3%">Jumlah</th>
														<!-- <th width="10%">Satuan</th> -->
														<th width="11%">Sub Total</th>
														<th width="25%">Aksi</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
												<tfoot>
													<tr>
														<td colspan="3" align="right"><strong>Total : </strong></td>
														<td id="total" style="text-align: right;"></td>

														<td>
															<input type="hidden" name="total_hidden" value="">
															<input type="hidden" name="max_hidden" value="">
															<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
														</td>
													</tr>
												</tfoot>
											</table>
										</div>
									</form>
								</div>
								<div class="col-sm-6 d-flex justify-content-end text-right nota">

								</div>
							</div>
						</div>
						<!-- /.card-header -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
