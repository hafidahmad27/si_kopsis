$(function () 
{
	$(".btnTambahb").on("click", function() {
        $("#formModalLabel").html("Input Barang");
		$(".modal-footer button[type=submit]").html("Simpan");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Barang/tambah_aksi"
		);
		document.getElementById('formResetData').reset();
	});
	
	$(".btnEditb").on("click", function () {
		$("#formModalLabel").html("Edit Barang");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Barang/update"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/si_kopsis/Barang/getUbah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#kode_barang").val(data.kode_barang);
				$("#id_kategori").val(data.id_kategori);
				// $("#nama_kategori").val(data.nama_kategori);
				$("#nama_barang").val(data.nama_barang);
				$("#harga_jual").val(data.harga_jual);
				$("#stok_barang").val(data.stok_barang);
			},
		});
	});
});
