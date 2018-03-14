<div class="span9">
	<div class="content">
		<div class="module message">
			<div class="module-head">
				<h3>Surat Masuk</h3>
				</div>
				<div class="module-option clearfix">
					<?php echo $this->session->flashdata("notif");?>
					<div class="pull-left">
						<a href="<?php echo base_url('surat_masuk/add') ?>" class="btn btn-primary"><i class="icon-plus-sign"></i> Tambah</a>
						</div>
						<div class="pull-right">
							<form class="form-search" method="post" action="<?php echo base_url('klasifikasi/search')?>">
									<div class="input-append">
											<input type="text" class="span3" placeholder="cari surat..." name="q" value="">
											<button type="submit" class="btn"><i class="icon-search"></i></button>
									</div>
							</form>
						</div>
					</div>
					<div class="module-body table">
						<table class="table table-message">
							<tbody>
								<tr class="heading" style="background:dodgerblue">
									<th class="cell-title" style="width:15%">No. Agenda , Kode</th>
									<th class="cell-author" style="width:20%">Asal Surat</th>
									<th class="cell-title">Isi Surat</th>
									<th class="cell-time align-right" style="width:18%">Status Disposisi</th>
									<th></th>
								</tr>
								<?php foreach ($data as $key) { ?>
									<tr class="read clickable-row" data-href="<?php echo base_url('surat_masuk/detail/'.$key->id) ?>">
										<td class="cell-title">
											<?php if ($key->lihat == 0): ?>
												<b class="label green pull-right">baru</b>
											<?php endif; ?>
											<?php echo $key->no_agenda?> <span><br /></span> <?php echo $key->kode?>
										</td>
										<td class="cell-author"><?php echo $key->dari?></td>
										<td class="cell-title">
											<?php echo $key->isi_ringkas ?>
										</td>
										<td class="cell-time" style="text-align:center"><span class="label label-warning">Belum</span></td>
										<td>
											<div class="btn-group">
												<a class="btn btn-default btn-small" href="<?php echo base_url('surat_masuk/edit/'.$key->id) ?>" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit"></i></a>
												<a onclick="return confirm('Anda yakin ingin menghapus ?')" class="btn btn-default btn-small" href="<?php echo base_url('surat_masuk/delete/'.$key->id) ?>" data-toggle="tooltip" title="" data-original-title="Hapus"><i class="icon-trash"></i></a>
											</div>
										</td>
									</tr>
								<?php } ?>

							</tbody>
						</table>
					</div>
					<div class="module-foot">
						<div class="row-fluid">
							<div class="span5">

                </div>
              <div class="span7"><div class="pagination pull-right" style="margin-top:0px; margin-right:10px">
                <ul><?php echo $pagi; ?></ul>
              </div>
            </div>
        	</div>
					</div>
				</div>
			</div>
			<!--/.content-->
		</div>
