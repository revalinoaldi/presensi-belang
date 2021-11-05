		<link href="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h5 class="txt-dark">Data Utama</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li><a href="#"><span>data</span></a></li>
					<li class="active"><span>data-karyawan</span></li>
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
							<h6 class="panel-title txt-dark">Data Karyawan</h6>
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
												<th style="width: 50px;">Email</th>
												<th>Divisi</th>
												<th>Jabatan</th>
												<th>Gaji Pokok</th>
												<th>#</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Nip</th>
												<th>Email</th>
												<th>Divisi</th>
												<th>Jabatan</th>
												<th>Gaji Pokok</th>
												<th>#</th>
											</tr>
										</tfoot>
										<tbody>
											<?php $no=1; foreach($data as $emp ): ?>

											<tr>
												<td><?= $no++ ?></td>
												<td><?= $emp['nama_karyawan'] ?></td>
												<td><?= $emp['nip'] ?></td>
												<td><?= $emp['email'] ?></td>
												<td><?= $emp['divisi'] ?></td>
												<td><?= $emp['jabatan'] ?></td>
												<td>Rp. <?= number_format($emp['gaji_pokok'],0,',','.') ?></td>
												<td>
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"
													data-nip="<?= $emp['nip'] ?>" data-nama="<?= $emp['nama_karyawan'] ?>" data-gapok="<?= $emp['gaji_pokok'] ?>"><i class="fa fa-pencil"></i></button>
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

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form method="post" id="frmPost">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Update Gaji Pokok</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nip" class="control-label">NIP:</label>
							<input type="text" name="nip" class="form-control" id="nip" readonly="">
						</div>
						<div class="form-group">
							<label for="nama" class="control-label">Nama:</label>
							<input type="text" name="nama" class="form-control" id="nama" readonly="">
						</div>
						<div class="form-group">
							<label for="gapok" class="control-label">Gaji Pokok:</label>
							<input type="text" name="gapok" class="form-control" id="gapok">
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Send message</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/') ?>dist/js/dataTables-data.js"></script>

	<script type="text/javascript">
		$(document).ready(() => {
			$('#exampleModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var nip = button.data('nip') 
			  var nama = button.data('nama') 
			  var gapok = button.data('gapok') 
			  var modal = $(this)

			  let url = `<?= site_url('Karyawan/updateGajiPokok/') ?>${nip}`
			  
			  modal.find('.modal-body #nip').val(nip)
			  modal.find('.modal-body #nama').val(nama)
			  modal.find('.modal-body #gapok').val(gapok)
			  modal.find('#frmPost').attr('action',url)
			})
		})
	</script>