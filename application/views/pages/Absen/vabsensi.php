		<link href="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Data Transaksi</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="#"><span>data</span></a></li>
					<li class="active"><span>data-daftar absensi</span></li>
				</ol>
			</div>
			<!-- /Breadcrumb -->
		</div>	
		<!-- Row -->
		<div class="row">
			<?php if (@$this->session->flashdata('notif')): ?>
				<div class="col-sm-12">
					<?php  
					if (@$this->session->flashdata('notif')) {
						echo $this->session->flashdata('notif');
						$this->session->unset_userdata('notif');
					}
					?>
				</div>
			<?php endif ?>
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-heading">
						<div class="pull-left">
							<h6 class="panel-title txt-dark">Data Absensi</h6>
							<p>Record Date : <?= date('d M Y', strtotime($date['tgl_from'])) ?> - <?= date('d M Y', strtotime($date['tgl_at'])) ?></p>
						</div>
						<?php if (!$gaji): ?>
							<div class="pull-right">
								<a href="<?= site_url('Absensi/generate') ?>" class="btn btn-success " style="color: white;"><i class="fa fa-refresh" style="color: white;"></i> Generated Gaji</a>
							</div>
						<?php else: ?>
							<div class="pull-right">
								<a href="javascript:void(0)" class="btn btn-success " style="color: white;"><i class="fa fa-check" style="color: white;"></i>&nbsp; Success Generated Gaji</a>
							</div>
						<?php endif ?>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="table-wrap">
								<div class="table-responsive">
									<table id="datable_absensi" class="table table-hover display  pb-30" >
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Nik</th>
												<th>Divisi</th>
												<th>Jabatan</th>
												<th class="text-center">Shift 1</th>
												<th class="text-center">Shift 2</th>
												<th class="text-center">Shift 3</th>
												<th class="text-center">Total Jam Lembur</th>
												<th class="text-center">Sisa Cuti</th>
												<th class="text-center">Total Tidak Masuk</th>
												<th class="text-center">Total Hadir</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Nik</th>
												<th>Divisi</th>
												<th>Jabatan</th>
												<th class="text-center">Shift 1</th>
												<th class="text-center">Shift 2</th>
												<th class="text-center">Shift 3</th>
												<th class="text-center">Total Jam Lembur</th>

												<th class="text-center">Sisa Cuti</th>
												<th class="text-center">Total Tidak Masuk</th>
												<th class="text-center">Total Hadir</th>
											</tr>
										</tfoot>
										<tbody>
											<?php $no=1; foreach($data['data'] as $absen ): ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $absen['nama_karyawan'] ?></td>
												<td><?= $absen['nip_karyawan'] ?></td>
												<td><?= $absen['divisi'] ?></td>
												<td><?= $absen['jabatan'] ?></td>
												<td style="text-align: center;"><?= $absen['total_shift1'] ?></td>
												<td style="text-align: center;"><?= $absen['total_shift2'] ?></td>
												<td style="text-align: center;"><?= $absen['total_shift3'] ?></td>

												<td style="text-align: center;"><?= @$absen['total_lemburan'] ? $absen['total_lemburan'] : 0 ?> Jam</td>
												<td style="text-align: center;"><?= $absen['sisa_jatah_cuti'] ?></td>
												<td style="text-align: center;"><?= $absen['total_tidak_masuk'] ?></td>
												<td style="text-align: center;"><?= ($absen['total_shift1']+$absen['total_shift2']+$absen['total_shift3'])-$absen['total_tidak_masuk'] ?></td>
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