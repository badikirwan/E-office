<div class="span9">
	<div class="content">
		<div class="module message">
			<div class="module-head">
				<h3>Disposisi surat</h3>
			</div>
			<div class="module-option clearfix">
				<?php echo $this->session->flashdata("notif");?>
				<div class="pull-left">
					<a href="<?php echo base_url('disposisi/add/'.$id)?>" class="btn btn-primary">Tambah</a>
				</div>
				<br><br>
				<div class="well well-small well-box" style="margin-bottom: auto;">
					<b>Perihal surat :</b> <i><?php echo $judul_surat ?></i>
				</div>
		</div>
			<div class="module-body table">
				<table class="table table-message">
					<thead>
						<tr bgcolor="lavender">
							<th width="5%">ID</th>
							<th width="20%">Tujuan Disposisi</th>
							<th width="30%">Isi Disposisi</th>
							<th width="25%">Sifat, Batas Waktu</th>
							<th width="10%">Status</th>
							<th width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if (empty($data)): ?>
								<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>
						<?php else: ?>
							<?php $no = 0 ?>
							<?php foreach ($data as $key): ?>
								<?php $no++ ?>
								<tr>
									<td><?php echo $no?></td>
									<td><?php echo $key->kpd_yth ?></td>
									<td><?php echo $key->isi_disposisi ?></td>
									<td><?php echo $key->sifat ?><br><i>Batas waktu s/d <?php echo $key->batas_waktu ?></i></td>
									<?php if ($key->status == 0): ?>
									<td><span class="label label-warning">Proses</span></td>
									<?php else: ?>
									<td><span class="label label-success">Selesai</span></td>
									<?php endif; ?>
									<td>
										<div class="btn-group">
											<a class="btn btn-default btn-small" href="<?php echo base_url('disposisi/edit/'.$key->id) ?>" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit"></i></a>
											<button class="btn btn-default btn-small delete-dis" value="<?php echo $key->id ?>" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-trash"></i></button>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="module-foot">

			</div>
		</div>
	</div>
</div>
