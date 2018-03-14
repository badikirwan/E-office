<div class="span9">
				<div class="content">
					<div class="module message">
						<div class="module-head">
							<h3>Klasifikasi Surat</h3>
						</div>
							<?php echo $this->session->flashdata("notif");?>
							<div class="module-option clearfix">
            	<div class="pull-right">
                <form class="form-search" method="post" action="<?php echo base_url('klasifikasi/search')?>">
                    <div class="input-append">
                        <input type="text" class="span3" placeholder="cari klasifikasi surat" name="q" value="">
                        <button type="submit" class="btn"><i class="icon-search"></i></button>
                    </div>
                </form>
            	</div>
							<?php if ($this->session->userdata('admin_level') == 'Administrator'): ?>
								<div class="pull-left">
	                <a href="<?php echo base_url('klasifikasi/add/')?>" class="btn btn-primary"><i class="icon-plus-sign"></i> Tambah</a>
	              </div>
							<?php endif; ?>
        		</div>
						<div class="module-body table">
            <table class="table table-message">
                <thead>
                    <tr bgcolor="lavender">
                        <th width="10%">Kode</th>
                        <th width="20%">Nama</th>
                        <th width="60%">Uraian</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
	              <tbody>
										<?php if (empty($data)) {
											echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
										} else { ?>
											<?php foreach ($data as $key) { ?>
											<tr class="read">
												<td><a href="http://elearning.dokumenary.net/2.0/index.php/pengumuman/detail/18"><b><?= $key->kode ?></b></a></td>
			                  <td><?= $key->nama ?></td>
			                  <td><?= $key->uraian ?></td>
			                  <td>
													<?php if ($this->session->userdata('admin_level') == 'Administrator'): ?>
														<div class="btn-group">
															<a class="btn btn-default btn-small" href="<?= base_url('klasifikasi/edit/'.$key->id)?>" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit"></i></a>
			 												<a onclick="return confirm('Anda yakin ingin menghapus ?')" class="btn btn-default btn-small" href="<?= base_url('klasifikasi/delete/'.$key->id)?>" data-toggle="tooltip" title="" data-original-title="Hapus"><i class="icon-trash"></i></a>
				                    </div>
													<?php endif; ?>
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
				</div><!--/.content-->
			</div>
		</div>
