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
		<h3 style="font-size: 12pt; line-height: 20px;">LAPORAN DATA SUPPLIER</h3>
	</center>

	<table border="1" cellspacing="0" cellpadding="5" width="100%">
		<thead>
			<tr>
				<th style="width: 5%;">No.</th>
				<th>Nama Supplier</th>
				<th style="width: 34%;">Alamat Supplier</th>
				<th style="width: 17%;">Telepon</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($supplier as $suplier) : ?>
				<tr>
					<td style="text-align: center;"><?= $no++ ?></td>
					<td><?= $suplier->nama_supplier ?></td>
					<td><?= $suplier->alamat_supplier ?></td>
					<td><?= $suplier->telepon ?></td>
					<td><?= $suplier->keterangan ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<!-- <tr style="text-align: center;">
				<td colspan="3" align="right"><strong>Total : </strong></td>
				<?php foreach ($sum_terjual as $sum) : ?>
					<td><?= $sum->total_terjual ?></td>
				<?php endforeach; ?>
			</tr> -->
		</tfoot>
	</table>
	<h5 style="font-weight: normal;">Dicetak pada tanggal : <?= date('d M Y') ?>, Pukul : <?= date('H:i:s') ?></h5>
</body>

</html>
