<div class="col-sm-12">
	<div class="panel panel-default card-view">
		<div class="panel-heading">
			<div class="pull-left">
				<h6 class="panel-title txt-dark">Data Jabatan</h6>
				<p> PT. Ikeda Indonesia</p>
			</div>
			<div class="pull-right">
				<a href="<?= site_url('jabatan/tambah') ?>" class="btn btn-primary">Tambah</a>
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
					<div class="table-responsive">
						<table class="table table-hover table-bordered mb-0">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Jabatan</th>
									<?php foreach ($tunjangan as $key): ?>
										<th class="text-center"><?= $key['jns_tunjangan'] ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; $p=0; foreach($data as $jabatan ): ?>

								<tr>
									<td><?= $no++ ?></td>
									<td><?= $jabatan['jabatan'] ?></td>
									<?php foreach ($tunjangan as $key): ?>
										<?php if (@$jabatan['detail']): ?>
											<?php $q=1; foreach ($jabatan['detail'] as $val): ?>
											<?php if ($val['id_jabatan'] == $jabatan['id'] && $key['id_tunjangan'] == $val['id_tunjangan']): $q=1; ?>
												<td class="text-center">Rp. <?= number_format($key['total_tunjangan']) ?> <a href="javascript:void(0);" onclick="deleted(this)" data-jabatan="<?= $val['id_jabatan'] ?>" data-tunjangan="<?= $key['id_tunjangan'] ?>" class="text-danger" title="Hapus"><i class="fa fa-times"></i></a></td>
											<?php else: ?>
												<?php if ($q == count($jabatan['detail'])){ ?>
													<td class="text-center">Rp. 0,00</td>
													<?php $q=1; } $q++; ?>
												<?php endif ?>
											<?php endforeach ?>
										<?php else: ?>
											<td></td>
										<?php endif ?>										
									<?php endforeach ?>
								</tr>
								<?php $p++; endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<script type="text/javascript">
	async function deleted(all) {
		let req = confirm(`Are you sure deleted?`)

		if (req) {
			const data = JSON.stringify({
				jabatan: $(all).data('jabatan'),
				tunjangan: $(all).data('tunjangan')
			});


			let result = await fetch(`<?= site_url('Jabatan/delete') ?>`,{
				method: 'POST',
				body: data
			}).then(res => res.json())

			if (result.result) {
				
				window.location.href = `<?= site_url('jabatan') ?>`
			}
		}
	}
</script>		