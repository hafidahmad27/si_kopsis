$(function () 
{
    $('tfoot').hide()
    $(document).keypress(function(event) {
        if (event.which == '13') {
            event.preventDefault();
        }
    })

    $('#pilih_nama_barang').on('change', function() {
        if ($(this).val() == '') reset()
        else {
            const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
            $.ajax({
                url: url_get_all_barang,
                type: 'POST',
                dataType: 'json',
                data: {
                    nama_barang: $(this).val()
                },
                success: function(data) {
                    // $('input[name="kode_barangj"]').val(data.kode_barangj)
                    $('input[name="harga_jualp"]').val(data.harga_jual)
                    $('input[name="jumlah"]').val(1)

                    $('input[name="max_hidden"]').val(data.stok)
                    $('input[name="jumlah"]').prop('readonly', false)
                    $('button#tambah').prop('disabled', false)

                    $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_jualp"]').val())

                    $('input[name="jumlah"]').on('keydown keyup change blur', function() {
                        $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_jualp"]').val())
                    })
                }
            })
        }
    })

    $(document).on('click', '#tambah', function(e) {
		const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
        const data_keranjang = {
			nama_barang: $('select[name="pilih_nama_barang"]').val(),
            harga_jual: $('input[name="harga_jualp"]').val(),
            jumlah: $('input[name="jumlah"]').val(),
            sub_total: $('input[name="sub_total"]').val(),
        }
		
        if (parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
            alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))
            console.log("if");
        } else {
            $.ajax({
                url: url_keranjang_barang,
                type: 'POST',
                data: data_keranjang,
                success: function(data) {
                    if ($('select[name="pilih_nama_barang"]').val() == data_keranjang.nama_barang) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
                    console.log("else");
                    reset()

                    $('table#keranjang tbody').append(data)
                    $('tfoot').show()

                    $('#total').html('<strong>' + hitung_total() + '</strong>')
                    $('input[name="total_hidden"]').val(hitung_total())
                }
            })
        }

    })

    $(document).on('click', '#tombol-hapus', function() {
        $(this).closest('.row-keranjang').remove()

        $('option[value="' + $(this).data('nama-barang') + '"]').show()

        if ($('tbody').children().length == 0) $('tfoot').hide()
    })

    $('button[type="submit"]').on('click', function() {
        // $('input[name="kode_barangj"]').prop('disabled', true)
        $('select[name="pilih_nama_barang"]').prop('disabled', true)
        $('input[name="harga_jualp"]').prop('disabled', true)
        $('input[name="jumlah"]').prop('disabled', true)
        $('input[name="sub_total"]').prop('disabled', true)
    })

    function hitung_total() {
        let total = 0;
        $('.sub_total').each(function() {
            total += parseInt($(this).text())
        })

        return total;
    }

    function reset() {
        $('#pilih_nama_barang').val('')
        // $('input[name="kode_barangj"]').val('')
        $('input[name="harga_jualp"]').val('')
        $('input[name="jumlah"]').val('')
        $('input[name="sub_total"]').val('')
        $('input[name="jumlah"]').prop('readonly', true)
        $('button#tambah').prop('disabled', true)
    }
});
