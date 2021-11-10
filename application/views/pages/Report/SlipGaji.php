<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Report Slip Gaji</title>
	<link rel="stylesheet" media="print" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<style type="text/css">
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
			height: 297mm;        
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
<body class="wrapper-page">
	<?php $month = date('F_Y', strtotime($val['tgl_terima_gaji'])); ?>
	<div class="container mb-3 wrapper-page">
		<div class="row" style="border: 1px solid black;">
			<div class="col-3 text-center">
				<img src="<?= base_url('assets/img/logo/logo.jpeg') ?>" class="img-thumbnail" alt="">
			</div>
			<div class="col-8">
				<h1>PT IKEDA INDONESIA CIKARANG</h1>
				<h6>Kawasan Industri Jababeka, Jl. Jababeka VI, Wangunharja, Kec. Cikarang Utara, Bekasi, Jawa Barat 17530</h6>
				<hr style="margin:5px">
				<h5>Rincian Gaji Kotor Dalam Satu Periode Sebagai Pembanding dan Pemeriksaan Ulang Bagi Karyawan</h5>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-9">
				<h4>Slip Gaji</h4>
			</div>
			<div class="col-3">
				<h5>Month : <?= date('F', strtotime($val['tgl_terima_gaji'])) ?></h5>
			</div>
		</div>

		<div class="row">
			<div class="col-9">&nbsp;</div>
			<div class="col-3">
				<div style="margin-left:25px;">
					<b>No Urut <br> #<?= $val['id_gaji'] ?></b><br>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-9">
				<span>Intended For</span> <br> 
				<span>Nip : <?= $val['absen']['nip_karyawan'] ?></span> <br>
				<span>Nama : <?= $val['absen']['nama_karyawan'] ?></span> <br>
				<span>Jabatan : <?= $val['absen']['jabatan'] ?></span> <br>
			</div>
			<div class="col-3">
				<div style="margin-left:25px;">
					<span>Absensi : <?= $val['absen']['total_tidak_masuk'] ?></span><br>
					<span>Jumlah Hari : <?= ($val['absen']['total_shift1']+$val['absen']['total_shift2']+$val['absen']['total_shift3']-$val['absen']['total_tidak_masuk']) ?></span><br>
					<span>Cuti : <?= @$val['absen']['total_cuti'] ? $val['absen']['total_cuti'] : 0 ?></span><br>
					<span>Sisa Cuti : <?= $val['absen']['sisa_jatah_cuti'] ?></span><br>
				</div>
			</div>
		</div>

		<hr style="border: 1px solid black">

		<table border="0" cellpadding="8" cellspacing="0" style="width:95%; margin-left: 25px;">
			<tr>
				<td style="width: 75%">Gaji Pokok</td>
				<td class="text-right">Rp <?= number_format($val['gp'],0,',','.') ?></td>
			</tr>
			<?php foreach ($tunjangan as $key): ?>
				<tr>
					<td style="width: 75%"><?= $key['jns_tunjangan'] ?></td>
					<?php $total = 0; foreach ($val['tunj'] as $v): ?>
					<?php $total += ($key['id_tunjangan'] == $v['id_tunjangan'] ? (int)$v['total_tunjangan'] : 0); ?>
				<?php endforeach ?>
				<td class="text-right">Rp <?= number_format($total,0,',','.') ?></td>
			</tr>
		<?php endforeach ?>

		<tr>
			<td style="width: 75%">Lemburan (<?= $val['lembur'] ?> Jam)</td>
			<td class="text-right">Rp <?= number_format($val['total_lemburan'],0,',','.') ?></td>
		</tr>

		<tr style="border-top: 1px solid black; font-weight: bold;">
			<td>Total Gaji Kotor</td>
			<td class="text-right">Rp <?= number_format($val['total_gaji'],0,',','.') ?></td>
		</tr>
	</table>
	<hr style="border: 1px solid black">

	<div class="row">
		<div class="col">
			<p>Apabila terdapat ketidaksesuaian, segera laporkan kepada leader lapangan. <br>Batas waktu laporan max. 1 hari kerja <br>Terima Kasih</p>
		</div>
	</div>
</div>

<div class="page_break"></div>
<br pagebreak="true"/>
</body>
</html>