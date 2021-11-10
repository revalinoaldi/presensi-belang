<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<style type="text/css">
	table.header{
		width: 90%;
	}
	.logo_container: {
		width: 120px;
		text-align: left;
	}
	.main_logo {
		height: 150px
	}
	body {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;
		font: 12pt "Tahoma";
	}
	* {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}
	.page {
		width: 210mm;
		min-height: 297mm;
		padding: 20mm;
		margin: 10mm auto;
		border: 1px #D3D3D3 solid;
		border-radius: 5px;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}
	.subpage {
		padding: 1cm;
		border: 5px red solid;
		height: 257mm;
		outline: 2cm #FFEAEA solid;
	}
	
	@page {
		size: A4;
		margin: 0;
	}
	@media print {
		html, body {
			width: 210mm;
			height: 250mm;        
		}
		.page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
	}
	.page_break { page-break-before: always; }
	.wrapper-page {
		page-break-after: always;
	}

	.wrapper-page:last-child {
		page-break-after: avoid;
	}
</style>
</head>
<body onload="print()">
	<div class="wrapper-page" style="border: 1px solid black; padding: 10px; margin-bottom: 35px;">
		<center>
			<table class="header">
				<tr style="border: 1px solid black; margin: 15px">
					<td class="logo_container left" style="text-align: center;">
						<img src="<?= base_url('assets/img/logo/logo.jpeg') ?>" class="main_logo" style="width: 150px;height:auto" alt="">
					</td>
					<td>
						<h3>PT IKEDA INDONESIA CIKARANG</h3>
						<h4>Kawasan Industri Jababeka, Jl. Jababeka VI, Wangunharja, Kec. Cikarang Utara, Bekasi, Jawa Barat 17530</h4>
						<hr style="margin:5px; ">
						<h4>Rincian Gaji Kotor Dalam Satu Periode Sebagai Pembanding dan Pemeriksaan Ulang Bagi Karyawan</h4>
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="2" cellspacing="0" style="width: 87%; "> 
				<tr>
					<td style="width: 70%;">
						<h4>Slip Gaji</h4>
					</td>
					<td>
						<h4>Month : <?= date('F Y', strtotime($val['tgl_terima_gaji'])) ?></h4>
					</td>
				</tr>
				<tr>
					<td style="width: 70%;">
						&nbsp;
					</td>
					<td>
						<h4 style="margin-left: 15px;"><b>No Urut <br> #<?= $val['id_gaji'] ?></b><br></h4>
					</td>
				</tr>
				<tr>
					<td style="width: 70%;">

						<span>Intended For</span><br>
						<span>Nip : <?= $val['absen']['nip_karyawan'] ?></span> <br>
						<span>Nama : <?= $val['absen']['nama_karyawan'] ?></span> <br>
						<span>Jabatan : <?= $val['absen']['jabatan'] ?></span> <br>
					</td>
					<td>
						<div style="margin-left: 15px;">
							<span>Absensi : <?= $val['absen']['total_tidak_masuk'] ?></span><br>
							<span>Jumlah Hari : <?= ($val['absen']['total_shift1']+$val['absen']['total_shift2']+$val['absen']['total_shift3']-$val['absen']['total_tidak_masuk']) ?></span><br>
							<span>Cuti : <?= @$val['absen']['total_cuti'] ? $val['absen']['total_cuti'] : 0 ?></span><br>
							<span>Sisa Cuti : <?= $val['absen']['sisa_jatah_cuti'] ?></span><br>
						</div>
					</td>
				</tr>
			</table>

			<hr style="border: 1px solid black; width: 87%; margin: 30px 0px;">

			<table border="0" cellpadding="8" cellspacing="0" style="width:85%; margin-top: 25px;">
				<tr>
					<td style="width: 60%">Gaji Pokok</td>
					<td class="text-right">Rp <?= number_format($val['gp'],0,',','.') ?></td>
				</tr>
				<?php foreach ($tunjangan as $key): ?>
					<tr>
						<td style="width: 60%"><?= $key['jns_tunjangan'] ?></td>
						<?php $total = 0; foreach ($val['tunj'] as $v): ?>
						<?php $total += ($key['id_tunjangan'] == $v['id_tunjangan'] ? (int)$v['total_tunjangan'] : 0); ?>
					<?php endforeach ?>
					<td class="text-right">Rp <?= number_format($total,0,',','.') ?></td>
				</tr>
			<?php endforeach ?>

			<tr>
				<td style="width: 60%">Lemburan (<?= $val['lembur'] ?> Jam)</td>
				<td class="text-right">Rp <?= number_format($val['total_lemburan'],0,',','.') ?></td>
			</tr>

			<tr style="border-top: 1px solid black; font-weight: bold;">
				<td style="width: 60%">Total Gaji Kotor</td>
				<td class="text-right">Rp <?= number_format($val['total_gaji'],0,',','.') ?></td>
			</tr>
		</table>
		<hr style="border: 1px solid black; width: 87%;">
		<table border="0" cellpadding="2" cellspacing="0" style="width: 87%; ">
			<tr>
				<td><p>Apabila terdapat ketidaksesuaian, segera laporkan kepada leader lapangan. <br>Batas waktu laporan max. 1 hari kerja <br>Terima Kasih</p></td>
			</tr>
		</table>
	</center>
</div>
</body>
</html>