$(function () 
{
	$(".btnTambahsout").on("click", function() {
        $("#formModalLabel").html("Input Stok Keluar");
		$(".modal-footer button[type=submit]").html("Simpan");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Stok_Keluar/tambah_aksi"
		);
		document.getElementById('formResetData').reset();
	});
	
	$(".btnEditsout").on("click", function () {
		$("#formModalLabel").html("Edit Stok Keluar");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Stok_Keluar/update"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/si_kopsis/Stok_Keluar/getUbah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id_stok_keluar").val(data.id_stok_keluar);
				$("#id_barang").val(data.id_barang);
				$("#id_supplier").val(data.id_supplier);
				$("#tanggal_stok_keluar").val(data.tanggal_stok_keluar);
				$("#jam_stok_keluar").val(data.jam_stok_keluar);
				$("#nama_barang").val(data.nama_barang);
				$("#jumlah_stok_keluar").val(data.jumlah_stok_keluar);
				// $("#harga_beli").val(data.harga_beli);
				// $("#total_harga_beli").val(data.total_harga_beli);
				$("#keterangan").val(data.keterangan);
			},
		});
	});
});
