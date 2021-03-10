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
</body>

</html>
