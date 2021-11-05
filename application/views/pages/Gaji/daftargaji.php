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

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Daftar Gaji kotor Karyawan</h6>
				</div>
				<div class="pull-right">
					<a href="<?= site_url('') ?>" class="btn btn-primary">ekspor</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Nip</th>
										<th>Jabatan</th>
										<th>Gaji Pokok</th>
										<th>Tunjangan Jabatan</th>
										<th>Tunjangan Rumah</th>
										<th>Tunjangan Shift</th>
										<th>Tunjangan Kehadiran</th>
										<th>Total Lembur</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Nip</th>
										<th>Jabatan</th>
										<th>Gaji Pokok</th>
										<th>Tunjangan Jabatan</th>
										<th>Tunjangan Rumah</th>
										<th>Tunjangan Shift</th>
										<th>Tunjangan Kehadiran</th>
										<th>Total Lembur</th>
									</tr>
								</tfoot>
								<tbody>
									
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
</div>

<script src="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/dataTables-data.js"></script>