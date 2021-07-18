$(function () 
{
	$(".btnTambahus").on("click", function() {
        $("#formModalLabel").html("Input User");
		$(".modal-footer button[type=submit]").html("Simpan");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/User/tambah_aksi"
		);
		document.getElementById('formResetData').reset();
	});
	
	$(".btnEditus").on("click", function () {
		$("#formModalLabel").html("Edit User");
		$(".modal-footer button[type=submit]").html("Edit");
		$(".modal-body form").attr(
			"action",
			"http://localhost/si_kopsis/User/update"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/si_kopsis/User/getUbah",
			data: {
				id: id,
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#id_user").val(data.id_user);
				$("#nama_user").val(data.nama_user);
				$("#username").val(data.username);
				$("#password").val(data.password);
				$("#level").val(data.level);
			},
		});
	});
});
