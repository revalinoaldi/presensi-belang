<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Form Tunjangan Jabatan</h6>
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
					<div class="form-wrap">
						<form method="post" action="<?= site_url('jabatan/action/'.@$data->id_jabatan) ?>">
							<div class="form-group">
								<label class="control-label mb-10">Nama Jabatan</label>
								<select class="form-control " name="jabatan">
									<option value="">Choose One</option>
									<?php foreach ($data['data'] as $key): ?>
										<option value="<?= $key['id'] ?>"> <?= $key['jabatan'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group row">
								<?php foreach ($tunjangan as $val): ?>
									<div class="col-md-3">
										<div class="checkbox checkbox-primary">
											<input value="<?= $val['id_tunjangan'] ?>" type="checkbox" name="tunj[]">
											<label > <?= $val['jns_tunjangan'] ?> </label>
										</div>
									</div>
								<?php endforeach ?>
							</div>
							<div class="form-group pull-right">
								<a href="<?= site_url('jabatan') ?>" class="btn btn-danger btn-anim"><i class="icon-rocket"></i><span class="btn-text">Back</span></a>
								<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Save</span></button>
								
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
					<!-- /Row -->