<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<table width="100%">
		<tr>
			<td width="65" align="left"><img src="<?= base_url() ?>assets/dist/img/logo_kopsis.png" style="width: 100%;"></td>
			<td width="50%" align="center">
				<h2 style="font-size: 16pt; line-height: 8px;">KOPERASI SISWA "PANGESTU PAMBUDI"</h2>
				<h3 style="font-size: 15pt; line-height: 8px;">SMK NEGERI 1 SURABAYA</h3>
				<h3 style="font-size: 10pt; line-height: 3px;">JL. SMEA NO. 4, WONOKROMO SURABAYA</h3>
			</td>
		</tr>
	</table>

	<hr>

	<center>
		<h3 style="font-size: 12pt; line-height: 20px;">LAPORAN STOK MASUK</h3>
	</center>

	<table border="1" cellspacing="0" cellpadding="5" width="100%">
		<thead>
			<tr>
				<th style="width: 6%;">No</th>
				<th style="width: 11%;">Tgl&nbsp;Masuk</th>
				<th style="width: 7%;">Jam</th>
				<th style="width: 16%;">Nama Barang</th>
				<th style="width: 7%;">Jml</th>
				<th style="width: 11%;">Harga Beli</th>
				<th style="width: 14%;">Subtotal Harga Beli</th>
				<th style="width: 14%;">Nama Supplier</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($stok_masuk as $brgMasuk) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $brgMasuk->tanggal_stok_masuk ?></td>
					<td><?= $brgMasuk->jam_stok_masuk ?></td>
					<td><?= $brgMasuk->nama_barang ?></td>
					<td style="text-align: center;"><?= $brgMasuk->jumlah_stok_masuk ?></td>
					<td style="text-align: right;"><?= number_format($brgMasuk->harga_beli, 0, ',', '.') ?></td>
					<td style="text-align: right;"><?= number_format($brgMasuk->total_harga_beli, 0, ',', '.') ?></td>
					<td style="text-align: center;"><?= $brgMasuk->nama_supplier ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr style="text-align: right;">
				<td colspan="6" align="right"><strong>Total : </strong></td>
				<?php foreach ($sum_total_harga_beli as $sum) : ?>
					<td><?= number_format($sum->total, 0, ',', '.') ?></td>
				<?php endforeach; ?>
			</tr>
		</tfoot>
	</table>
	<h5 style="font-weight: normal;">Dicetak pada tanggal : <?= date('d M Y') ?>, Pukul : <?= date('H:i:s') ?></h5>
</body>

</html>
