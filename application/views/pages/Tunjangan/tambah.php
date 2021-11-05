<?php
//Notifikasi error

echo validation_errors('<div class="alert alert-warning">', '</div>' );

//form open
?>

<div class="row">
	<div class="col-sm-9">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">add form</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<form method="post" action="<?= site_url('TunjanganKaryawan/action/'.@$data->id_tunjangan) ?>">
							<div class="form-group">
								<label class="control-label mb-10" > Jenis Tunjangan :</label>
								<input type="text" class="form-control" value="<?= @$data->jns_tunjangan ? $data->jns_tunjangan : '' ?>" name="jenis" required="">
							</div>

							<div class="form-group">
								<label class="control-label mb-10" > Tipe Tunjangan:</label>
								<select name="tipe" class="form-control" required="">
								  <option value="tetap" <?= @$data->tipe_tunjangan == 'tetap' ? 'selected=""' : '' ?>>Tetap</option>
								  <option value="opsional" <?= @$data->tipe_tunjangan == 'opsional' ? 'selected=""' : '' ?>>Opsional</option>
								</select>
							</div>

							<div class="form-group">
								<label class="control-label mb-10" > Total Tunjangan :</label>
								<input type="number" value="<?= @$data->total_tunjangan ? $data->total_tunjangan : '' ?>" class="form-control" name="total" required="">	
		
							</div>
							<div class="form-group mb-0">
								<!-- <input type="submit" value="po"> -->
								<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Save</span></button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

