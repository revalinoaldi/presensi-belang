<link href="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Daftar Lembur</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<p>Record Date : <?= date('d M Y', strtotime($date['tgl_from'])) ?> - <?= date('d M Y', strtotime($date['tgl_at'])) ?></p>
						<div class="mt-40">
							<table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" id="datable_1" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
								<thead>
									<tr>
										<th>No</th>
										<th>NIP</th>
										<th>Nama</th>
										<th>Divisi</th>
										<th>Tanggal</th>
										<th>Jenis Lemburan</th>
										<th>Total Jam</th>
										<th>Uraian Tugas</th>
										<th>Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($data as $val): ?>
										<tr>
											<th><?= $no++ ?></th>
											<th><?= $val['nip_karyawan'] ?></th>
											<th><?= $val['nama_karyawan'] ?></th>
											<th><?= $val['divisi'] ?></th>
											<th><?= date('d-m-Y', strtotime($val['tgl_lembur'])) ?></th>
											<th><?= $val['jenis_lemburan'] ?></th>
											<th><?= $val['adj_act_time'] ?></th>
											<th><?= $val['uraian_tugas'] ?></th>
											<th><?= $val['keterangan'] ?></th>
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

	<script src="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/') ?>dist/js/dataTables-data.js"></script>