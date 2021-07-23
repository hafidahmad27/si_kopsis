<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<!-- <div class="col-sm-6">
					<h1 class="m-0">Selamat Datang ! </h1>
				</div>/.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li> -->
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<!-- BAR CHART -->
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Total Keuntungan per Bulan/Tahun</h3>
				</div>

				<div class="card-body">
					<div class="form-group">
						<label>Filter by :</label>
						<select class="form-control" style="width: 25%;" id="tahun" name="tahun">
							<option>2021</option>
							<option>2020</option>
						</select>
					</div>
					<div class="chart">
						<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
					</div>
				</div>
				<!-- /.card-body -->
			</div>

			<!-- PIE CHART -->
			<div class="card card-success">
				<div class="card-header">
					<h3 class="card-title">Barang Terlaris</h3>
				</div>
				<div class="card-body">
					<canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				</div>
				<!-- /.card-body -->
			</div>

		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
