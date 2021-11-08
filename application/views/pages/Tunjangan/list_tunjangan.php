
<link href="<?= base_url() ?>assets/vendors/bower_components/filament-tablesaw/dist/tablesaw.css" rel="stylesheet" type="text/css"/>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Data Tunjangan Karyawan</h6> 		
					<p class="text-muted">Jenis-Jenis Tunjangan Karyawan</p>

				</div>
				<div class="pull-right">
					<a href="<?= site_url('tunjangankaryawan/tambah') ?>" class="btn btn-primary">Tambah</a>
				</div>
				<div class="clearfix"></div>
				<?php  
				if (@$this->session->flashdata('notif')) {
					echo $this->session->flashdata('notif');
					$this->session->unset_userdata('notif');
				}
				?>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="mt-40">
							<table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
								<thead>
									<tr>
										<th>No</th>
										<th>Jenis Tunjangan</th>
										<th>Tipe Tunjangan</th>
										<th>Total Tunjangan</th>
										<th class="text-nowrap">Setting</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach($data as $tk ): ?>
									<tr>
										<td><?=$no++ ?></td>
										<td><?=$tk['jns_tunjangan'] ?></td>
										<td class="text-center"><?=$tk['tipe_tunjangan'] ?></td>
										<td class="text-center">Rp. <?= number_format($tk['total_tunjangan']) ?></td>
										<td class="text-nowrap">
											<a href="<?= site_url('tunjangankaryawan/tambah/'.$tk['id_tunjangan']) ?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
												<i class="fa fa-pencil text-inverse m-r-10"></i> </a> 
												<a href="javascript:void(0);" onclick="deleteme('<?= $tk['id_tunjangan'] ?>')" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a> </td>
											</tr>
										<?php 	endforeach ?>
									</tbody>
								</table>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap-table JavaScript -->
	<script src="<?= base_url() ?>assets/vendors/bower_components/filament-tablesaw/dist/tablesaw.js"></script>
	
	
	<!-- Switchery JavaScript -->
	<script src="<?= base_url() ?>assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>
	<script src="<?= base_url() ?>assets/dist/js/init.js"></script>

	<!-- /Row -->
	<script type="text/javascript">
		function deleteme(val) {
			const result = confirm('Yakin hapus data?');
			if (result) {
				const url = `<?= site_url('tunjangankaryawan/deleteTunjangan/') ?>${val}`
				window.location.href = url
			}
		}
	</script>