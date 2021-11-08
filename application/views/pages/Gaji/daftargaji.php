<link href="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark">Laporan per-Periode</h5>
	</div>
	<!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#"><span>laporan</span></a></li>
			<li class="active"><span>daftar-gaji</span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->
</div>
<!-- /Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Filter Data Gaji</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<form method="POST" action="<?= site_url('laporan') ?>">
							<div class="row">
								<?php  
									$month = [
										'1' => 'Januari',
										'2' => 'Februari',
										'3' => 'Maret',
										'4' => 'April',
										'5' => 'Mei',
										'6' => 'Juni',
										'7' => 'Juli',
										'8' => 'Agustus',
										'9' => 'September',
										'10' => 'Oktober',
										'11' => 'November',
										'12' => 'Desember',
									];
								?>
								<div class="form-group col-sm-5">
									<select class="form-control" name="month">
										<?php foreach ($month as $key => $val): ?>
											<option <?= $key == date('m') ? 'selected=""' : '' ?> value="<?= $key ?>"><?= $val ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group col-sm-5">
									<select class="form-control" name="year">
										<?php for ($i=date('Y'); $i >= 2010; $i--) { ?>
											<option <?= $i == date('Y') ? 'selected=""' : '' ?> value"<?= $i ?>"><?= $i ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-sm-2">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- Row -->

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Daftar Gaji kotor Karyawan</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_3" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Nip</th>
										<th>Jabatan</th>
										<th>Gaji Pokok</th>
										<?php foreach ($tunjangan as $tunj): ?>
											<th><?= $tunj['jns_tunjangan'] ?></th>
										<?php endforeach ?>
										<th>Total Tunjangan</th>
										<th>Jam Lembur</th>
										<th>Total Lembur</th>
										<th>Total Gaji</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nip</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Gaji Pokok</th>
										<?php foreach ($tunjangan as $tunj): ?>
											<th><?= $tunj['jns_tunjangan'] ?></th>
										<?php endforeach ?>
										<th>Total Tunjangan</th>
										<th>Jam Lembur</th>
										<th>Total Lembur</th>
										<th>Total Gaji</th>
										<th>Action</th>
									</tr>
								</tfoot>
								<tbody>
									<?php $no=1; foreach ($data as $val): ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $val['nip'] ?></td>
											<td><?= $val['emp']['nama_karyawan'] ?></td>
											<td><?= $val['emp']['jabatan'] ?></td>
											<td>Rp <?= number_format($val['gp'],0,',','.') ?></td>

											<?php foreach ($tunjangan as $key): ?>
											<?php $total = 0; foreach ($val['tunj'] as $v): ?>
												<?php $total += ($key['id_tunjangan'] == $v['id_tunjangan'] ? (int)$v['total_tunjangan'] : 0); ?>
											<?php endforeach ?>
											<th>Rp <?= number_format($total,0,',','.') ?></th>
										<?php endforeach ?>


											<td>Rp <?= number_format($val['total_tunjangan'],0,',','.') ?></td>
											<td><?= @$val['lembur'] ? $val['lembur'] : 0 ?> Jam</td>
											<td>Rp <?= number_format($val['total_lemburan'],0,',','.') ?></td>
											<td>Rp <?= number_format($val['total_gaji'],0,',','.') ?></td>
											<td>
												<a href="#" class="btn btn-primary btn-rounded btn-sm"><i class="fa fa-print"></i></a>
											</td>
										</tr>
									<?php endforeach ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

<script src="<?= base_url('assets/') ?>dist/js/dataTables-data.js"></script>