<div class="span9">
				<div class="content">
					<div class="module">
						<div class="module-head">
							<h3>Arsip Surat Keluar</h3>
						</div>
						<div class="">
							<?php echo $this->session->flashdata("notif");?>
							<div class="clearfix" style="margin:10px">
            	<div class="pull-right">
                <form class="form-search" method="post" action="<?php echo base_url('arsip/surat_masuk/cari')?>">
                    <div class="input-append">
                        <input type="text" class="span3" placeholder="cari arsip surat..." name="q" value="">
                        <button type="submit" class="btn"><i class="icon-search"></i></button>
                    </div>
                </form>
            	</div>
        		</div>
						<br />
						<div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr bgcolor="lavender">
                        <th width="20%">No Surat</th>
                        <th width="20%">Tgl. Dikirim</th>
                        <th width="20%">Tujuan</th>
                        <th width="60%">Uraian</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
	              <tbody>
										<?php if (empty($data)) {
											echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
										} else { ?>
											<?php foreach ($data as $key) { ?>
											<tr>
			                  <td><b><?= $key->no_surat?></b></td>
                        <td><?= $key->tgl_catat?></td>
                        <td><?= $key->tujuan?></td>
			                  <td><?= $key->isi_ringkas ?></td>
			                  <td>
			                    <div class="btn-group">
                            <a class="btn btn-default btn-small" href="<?= base_url('klasifikasi/edit/'.$key->id)?>" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-eye-open"></i></a>
														<a class="btn btn-default btn-small" href="<?= base_url('upload/surat_keluar/'.$key->file)?>" target="_blank" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-download-alt"></i></a>
		 												<a onclick="return confirm('Anda yakin ingin menghapus ?')" class="btn btn-default btn-small" href="<?= base_url('klasifikasi/delete/'.$key->id)?>" data-toggle="tooltip" title="" data-original-title="Hapus"><i class="icon-trash"></i></a>
			                    </div>
			                  </td>
											</tr>
										<?php	}
										} ?>
	            </tbody>
            </table>
        		</div>
						<br />
						<div class="row-fluid">
							<div class="span5">

                </div>
              <div class="span7"><div class="pagination pull-right" style="margin-top:0px; margin-right:10px">
                <ul><?php echo $pagi; ?></ul>
              </div>
            </div>
        	</div>
					</div>
				</div><!--/.content-->
			</div>
		</div>
