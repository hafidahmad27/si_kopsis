$(function () 
{
	$(".btnTambahsin").on("click", function() {
        $("#formModalLabel").html("Input Stok Masuk");
		$(".modal-footer button[type=submit]").html("Simpan");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Stok_Masuk/tambah_aksi"
		);
		
		// $('#jumlah_stok_masuk, #harga_beli').on('input',function() {
		// 	var qty = parseInt($('#jumlah_stok_masuk').val());
		// 	var price = parseFloat($('#harga_beli').val());
		// 	$('#total_harga_beli').val((qty * price ? qty * price : 0));
		// });
		document.getElementById('formResetData').reset();
	});
	
	$(".btnEditsin").on("click", function () {
		$("#formModalLabel").html("Edit Stok Masuk");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/Stok_Masuk/update"
		);
		
		const id = $(this).data("id");
		
		$.ajax({
			url: "http://localhost/si_kopsis/Stok_Masuk/getUbah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$('#jumlah_stok_masuk, #harga_beli').on('input',function() {
					var qty = parseInt($('#jumlah_stok_masuk').val());
					var price = parseFloat($('#harga_beli').val());
					$('#total_harga_beli').val((qty * price ? qty * price : 0));
				});
				$("#id_stok_masuk").val(data.id_stok_masuk);
				$("#id_barang").val(data.id_barang);
				$("#id_supplier").val(data.id_supplier);
				$("#tanggal_stok_masuk").val(data.tanggal_stok_masuk);
				$("#jam_stok_masuk").val(data.jam_stok_masuk);
				$("#nama_barang").val(data.nama_barang);
				$("#jumlah_stok_masuk").val(data.jumlah_stok_masuk);
				$("#harga_beli").val(data.harga_beli);
				$("#total_harga_beli").val(data.total_harga_beli);
				$("#keterangan").val(data.keterangan);
			},
		});
	});
});
