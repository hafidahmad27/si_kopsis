<footer class="main-footer">
	<strong>Copyright &copy; 2021 <a style="color: blue;">Kopsis SMKN 1 SBY</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Powered by</b> Hafid
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Load Script -->
<script src="<?= base_url() ?>assets/dist/js/modalEditSupplier.js"></script>
<script src="<?= base_url() ?>assets/dist/js/modalEditKategori.js"></script>
<script src="<?= base_url() ?>assets/dist/js/modalEditBarang.js"></script>
<script src="<?= base_url() ?>assets/dist/js/modalEditUser.js"></script>
<script src="<?= base_url() ?>assets/dist/js/modalEditStokMasuk.js"></script>
<script src="<?= base_url() ?>assets/dist/js/modalEditStokKeluar.js"></script>
<script src="<?= base_url() ?>assets/dist/js/penjualan.js"></script>
<!-- Page specific script -->
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": true,
			"autoWidth": false,
			"iDisplayLength": 50
			// "buttons": ["excel", "pdf", "print"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('.select2').select2()
	});
</script>
<script>
	var harga_jual = document.getElementById("harga_jual");
	harga_jual.addEventListener("keyup", function(e) {
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		harga_jual.value = formatRupiah(this.value);
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			harga_jual = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			harga_jual += separator + ribuan.join(".");
		}

		harga_jual = split[1] != undefined ? harga_jual + "," + split[1] : harga_jual;
		return prefix == undefined ? harga_jual : harga_jual ? +harga_jual : "";
	}
</script>
<script>
	var harga_beli = document.getElementById("harga_beli");
	harga_beli.addEventListener("keyup", function(e) {
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		harga_beli.value = formatRupiah(this.value);
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			harga_beli = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			harga_beli += separator + ribuan.join(".");
		}

		harga_beli = split[1] != undefined ? harga_beli + "," + split[1] : harga_beli;
		return prefix == undefined ? harga_beli : harga_beli ? +harga_beli : "";
	}
</script>
<!-- <script>
	var total_harga_beli = document.getElementById("total_harga_beli");
	total_harga_beli.addEventListener("keyup", function(e) {
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		total_harga_beli.value = formatRupiah(this.value);
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			total_harga_beli = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? "." : "";
			total_harga_beli += separator + ribuan.join(".");
		}

		total_harga_beli = split[1] != undefined ? total_harga_beli + "," + split[1] : total_harga_beli;
		return prefix == undefined ? total_harga_beli : total_harga_beli ? +total_harga_beli : "";
	}
</script> -->
<script>
	function grafik(total_keuntungan) {
		var barChartCanvas = $('#barChart').get(0).getContext('2d')
		var barChartData = {
			labels: [
				<?php
				foreach ($total_keuntungan_per_tgl as $terjual) : ?>
					<?= "'" . $terjual->tanggal_penjualan . "',"; ?>
				<?php endforeach; ?>
			],
			datasets: [{
				label: [
					'Total Keuntungan per Bulan/Tahun'

				],
				backgroundColor: 'rgba(210, 214, 222, 1)',
				borderColor: 'rgba(210, 214, 222, 1)',
				pointRadius: false,
				pointColor: 'rgba(210, 214, 222, 1)',
				pointStrokeColor: '#c1c7d1',
				pointHighlightFill: '#fff',
				pointHighlightStroke: 'rgba(220,220,220,1)',
				data: [
					<?php
					foreach ($total_keuntungan_per_tgl as $terjual) : ?>
						<?= "'" . $terjual->total_keuntungan . "',"; ?>
					<?php endforeach; ?>
				]
			}, ]
		}

		var barChartOptions = {
			responsive: true,
			maintainAspectRatio: false,
			datasetFill: false
		}

		var barChart = new Chart(barChartCanvas, {
			type: 'bar',
			data: barChartData,
			options: barChartOptions
		})

	}
	$(function() {
		/* ChartJS
		 * -------
		 * Here we will create a few charts using ChartJS
		 */

		//-------------
		//- BAR CHART -
		//-------------
		// var barChartCanvas = $('#barChart').get(0).getContext('2d')
		// var barChartData = {
		// 	labels: [
		// 		
		// 	],
		// 	datasets: [{
		// 		label: [
		// 			'Total Keuntungan per Bulan/Tahun'

		// 		],
		// 		backgroundColor: 'rgba(210, 214, 222, 1)',
		// 		borderColor: 'rgba(210, 214, 222, 1)',
		// 		pointRadius: false,
		// 		pointColor: 'rgba(210, 214, 222, 1)',
		// 		pointStrokeColor: '#c1c7d1',
		// 		pointHighlightFill: '#fff',
		// 		pointHighlightStroke: 'rgba(220,220,220,1)',
		// 		data: [
		// 			
		// 		]
		// 	}, ]
		// }

		// var barChartOptions = {
		// 	responsive: true,
		// 	maintainAspectRatio: false,
		// 	datasetFill: false
		// }

		// var barChart = new Chart(barChartCanvas, {
		// 	type: 'bar',
		// 	data: barChartData,
		// 	options: barChartOptions
		// })

		function grafik(total_keuntungan) {
			var tanggal_p = [];
			var tot = [];
			console.log(total_keuntungan);
			if (total_keuntungan == null) {
				tanggal_p = [
					<?php
					foreach ($total_keuntungan_per_tgl as $terjual) : ?>
						<?= "'" . $terjual->tanggal_penjualan . "',"; ?>
					<?php endforeach; ?>
				]
				tot = [
					<?php
					foreach ($total_keuntungan_per_tgl as $terjual) : ?>
						<?= "'" . $terjual->total_keuntungan . "',"; ?>
					<?php endforeach; ?>
				]
			} else {

			}
			for (let i = 0; i < total_keuntungan.length; i++) {
				tanggal_p[i] = total_keuntungan[i]['tanggal_penjualan'];
				tot[i] = total_keuntungan[i]['total_keuntungan'];
			}
			console.log(tanggal_p);
			var barChartCanvas = $('#barChart').get(0).getContext('2d')
			var barChartData = {
				labels: tanggal_p,
				datasets: [{
					label: [
						'Total Keuntungan per Bulan/Tahun'

					],
					backgroundColor: 'rgba(210, 214, 222, 1)',
					borderColor: 'rgba(210, 214, 222, 1)',
					pointRadius: false,
					pointColor: 'rgba(210, 214, 222, 1)',
					pointStrokeColor: '#c1c7d1',
					pointHighlightFill: '#fff',
					pointHighlightStroke: 'rgba(220,220,220,1)',
					data: tot
				}, ]
			}

			var barChartOptions = {
				responsive: true,
				maintainAspectRatio: false,
				datasetFill: false
			}

			var barChart = new Chart(barChartCanvas, {
				type: 'bar',
				data: barChartData,
				options: barChartOptions
			})

		}

		$("#tahun").change(function() {

			var thn = $(this).children('option:selected').val();
			console.log(thn);
			$.post('http://localhost/si_kopsis/dashboard/ambilId', {
				tahun: thn
			}, function(e) {
				console.log(e);
				var data = JSON.parse(e);
				grafik(data);
				// location.reload()
			});
		})

		//-------------
		//- PIE CHART -
		//-------------
		// Get context with jQuery - using jQuery's .get() method.
		var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
		var pieData = {
			labels: [
				<?php
				foreach ($barang_terjual_b as $terjual) : ?>
					<?= "'" . $terjual->nama_barang . "',"; ?>
				<?php endforeach; ?>
			],
			datasets: [{
				data: [
					<?php
					foreach ($barang_terjual_b as $terjual) : ?>
						<?= "'" . $terjual->jumlah_barang_terjual . "',"; ?>
					<?php endforeach; ?>
				],
				backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
			}]
		}
		var pieOptions = {
			maintainAspectRatio: false,
			responsive: true,
		}
		//Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		var pieChart = new Chart(pieChartCanvas, {
			type: 'pie',
			data: pieData,
			options: pieOptions
		})
	})
	// console.log('ok');
</script>
</body>

</html>
