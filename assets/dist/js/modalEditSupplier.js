$(function () 
{
	$(".btnTambahs").on("click", function() {
        $("#formModalLabel").html("Input Supplier");
		$(".modal-footer button[type=submit]").html("Simpan");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Supplier/tambah_aksi"
		);
		document.getElementById('formResetData').reset();
	});
	
	$(".btnEdits").on("click", function () {
		$("#formModalLabel").html("Edit Supplier");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Supplier/update"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/si_kopsis/Supplier/getUbah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id_supplier").val(data.id_supplier);
				$("#nama_supplier").val(data.nama_supplier);
				$("#alamat_supplier").val(data.alamat_supplier);
				$("#telepon").val(data.telepon);
				$("#keterangan").val(data.keterangan);
			},
		});
	});
});
