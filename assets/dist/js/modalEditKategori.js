$(function () 
{
	$(".btnTambah").on("click", function() {
        $("#formModalLabel").html("Input Kategori");
		$(".modal-footer button[type=submit]").html("Simpan");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Kategori_Barang/tambah_aksi"
		);
		document.getElementById('formResetData').reset();
	});
	
	$(".btnEdit").on("click", function () {
		$("#formModalLabel").html("Edit Kategori");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Kategori_Barang/update"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/si_kopsis/Kategori_Barang/getUbah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id_kategori").val(data.id_kategori);
				$("#nama_kategori").val(data.nama_kategori);
			},
		});
	});
});