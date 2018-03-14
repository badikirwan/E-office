<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tambah Surat Masuk</h3>
							</div>
							<div class="module-body">
								<?php echo form_open_multipart('surat_masuk/edit/'.$data->id, 'class="form-horizontal row-fluid"') ?>
								<div class="control-group">
										<label class="control-label">Nomor Agenda <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="no_agenda" class="span5" value="<?php echo set_value('no_agenda', $data->no_agenda)?>">
												<?php echo form_error('no_agenda', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Nomor Surat <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="no_surat" class="span5" value="<?php echo set_value('no_surat', $data->no_surat)?>">
												<?php echo form_error('no_surat', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Asal Surat <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="asal_surat" class="span8" value="<?php echo set_value('asal_surat', $data->dari)?>">
												<?php echo form_error('asal_surat', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Isi Ringkas<span class="text-error">*</span></label>
										<div class="controls">
												<textarea type="text" class="span8" name="isi_ringkas"><?php echo set_value('isi_ringkas', $data->isi_ringkas)?></textarea>
												<?php echo form_error('isi_ringkas', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Kode Klasifikasi <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" id="kode_klas" name="kode_klas" class="span5" value="<?php echo set_value('kode_klas', $data->kode)?>">
												<?php echo form_error('kode_klas', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Indeks Berkas <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="indeks" class="span5" value="<?php echo set_value('indeks', $data->indek_berkas)?>">
												<br />
												<?php echo form_error('indeks', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Tanggal Surat <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" id="tgl_start" name="tgl_surat" class="span5" value="<?php echo set_value('tgl_surat', $data->tgl_surat)?>">
												<br />
												<?php echo form_error('tgl_surat', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Keterangan<span class="text-error">*</span></label>
										<div class="controls">
												<textarea type="text" class="span8" name="keterangan"><?php echo set_value('keterangan', $data->keterangan)?></textarea>
												<?php echo form_error('keterangan', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
		                <label class="control-label">File Surat</label>
		                <div class="controls">
		                    <input type="file" name="userfile">
												<?php echo form_error('userfile', '<div class="text-error">', '</div>'); ?>
		                </div>
		            </div>

										<div class="control-group">
				                <div class="controls">
				                    <button type="submit" class="btn btn-primary">Simpan</button>
				                    <a href="<?php echo base_url('surat_masuk')?>" class="btn btn-default">Kembali</a>
				                </div>
				            </div>
									</form>
							</div>
						</div>
					</div><!--/.content-->
				</div>
