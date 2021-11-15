
<link href="<?= base_url() ?>assets/vendors/bower_components/filament-tablesaw/dist/tablesaw.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Data Users</h6> 		
					<p class="text-muted">Users Active</p>

				</div>
				<div class="pull-right">
					<button class="btn btn-primary" data-toggle="modal" data-target="#modalForm" data-action="add"><i class="fa fa-user-plus" style="color:white;"></i> Tambah</button>
				</div>
				<div class="clearfix"></div>
				
			</div>
			<?php  
			if (@$this->session->flashdata('notif')) {
				echo $this->session->flashdata('notif');
				$this->session->unset_userdata('notif');
			}
			?>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="mt-40 table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama User</th>
										<th class="text-center">Email</th>
										<th class="text-center">Username</th>
										<th class="text-center">Avatar</th>
										<th class="text-center">Active</th>
										<th class="text-nowrap text-center">#</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($data as $val): ?>
									<tr>
										<td><?= $i++ ?></td>
										<td><?= $val['nama'] ?></td>
										<td><?= $val['email'] ?></td>
										<td><?= $val['username'] ?></td>
										<td><?= $val['avatar'] ?></td>
										<td class="text-center">
											<?php if ($val['is_active'] == 1): ?>
												<span class="label label-success">Active</span>
											<?php else: ?>
												<span class="label label-danger">Not Active</span>
											<?php endif ?>
										</td>
										<td class="text-center">
											<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalForm" data-action="update" data-pk="<?= $val['id'] ?>"><i class="fa fa-pencil"></i></a>
											<a href="#" class="btn btn-danger" onclick="dlt('<?= $val['id'] ?>');"><i class="fa fa-user-times" ></i></a>
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

<!-- FO -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form method="POST" enctype="multipart/form-data" id="frmPost">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Form Users</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="nama" class="control-label">Nama Lengkap<span class="text-danger">*</span>:</label>
						<input type="text" class="form-control" id="nama" name="nama" required="">
					</div>
					<div class="form-group">
						<label for="email" class="control-label">Email<span class="text-danger">*</span>:</label>
						<input type="email" class="form-control" id="email" name="email" required="">
					</div>
					<div class="form-group">
						<label for="uname" class="control-label">Username<span class="text-danger">*</span>:</label>
						<input type="text" class="form-control" id="uname" name="uname" required="">
					</div>
					<div class="form-group">
						<label for="pass" class="control-label">Password:</label>
						<input type="password" class="form-control" id="pass" name="pass">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save Record</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- EFO -->


<!-- Bootstrap-table JavaScript -->
<script src="<?= base_url() ?>assets/vendors/bower_components/filament-tablesaw/dist/tablesaw.js"></script>


<!-- Switchery JavaScript -->
<script src="<?= base_url('assets/') ?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/dataTables-data.js"></script>
<script src="<?= base_url() ?>assets/dist/js/init.js"></script>



<!-- /Row -->
<script type="text/javascript">
	 function dlt(val) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then(async (result) => {
			if (result.isConfirmed) {
				let data = await fetch(`<?= site_url('Users/deleteUser/') ?>${val}`).then(response => response.json());
				console.log(data)
				if (data.result) {
					Swal.fire(
						'Deleted!',
						'Your record has been deleted.',
						'success'
					)
					setTimeout(() => {
						window.location.href = `<?= site_url('Users') ?>`
					}, 2000)
				}
			}
		})
	}
</script>
<script type="text/javascript">
	$('#modalForm').on('show.bs.modal', async function (event) {
		var button = $(event.relatedTarget)
		let action = button.data('action')
		var modal = $(this)
		let url = `<?= site_url('Users/action/') ?>`
		let id = '';

		if (action == "add") {
			modal.find('.modal-body input#nama').val('')
			modal.find('.modal-body input#email').val('')
			modal.find('.modal-body input#uname').val('')
			modal.find('.modal-body input#pass').val('')
			modal.find('.modal-content #frmPost').attr('action',url)
		}else{
			id = button.data('pk')
			console.log(id)
			let data = await fetch(`<?= site_url('Users/getUsers/') ?>${id}`).then(response => response.json())
			

			modal.find('.modal-body input#nama').val(data.data.nama)
			modal.find('.modal-body input#email').val(data.data.email)
			modal.find('.modal-body input#uname').val(data.data.username)
			
			modal.find('.modal-content #frmPost').attr('action',`${url}${id}`)
			
		}
		
	})
	
</script>