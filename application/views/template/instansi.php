<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Pengaturan Instansi</h3>
							</div>
							<div class="module-body">
								<?php echo $this->session->flashdata("notif");?>
								<?php echo form_open_multipart('instansi/save/1', 'class="form-horizontal row-fluid"') ?>
								<div class="control-group">
										<label class="control-label">Nama Instansi <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="nama" class="span8" value="<?php echo set_value('nama', $data->nama)?>">
												<?php echo form_error('nama', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Alamat Instansi<span class="text-error">*</span></label>
										<div class="controls">
												<textarea type="text" name="alamat" class="span8"><?php echo set_value('alamat', $data->alamat)?></textarea>
												<?php echo form_error('alamat', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Nama Pimpinan <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="pimpinan" class="span8" value="<?php echo set_value('pimpinan', $data->pimpinan)?>">
												<?php echo form_error('pimpinan', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">NIP Pimpinan <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="nip" class="span8" value="<?php echo set_value('nip', $data->nip_pimpinan)?>">
												<?php echo form_error('nip', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>

								<div class="control-group">
		                <label class="control-label">Logo Instansi</label>
		                <div class="controls">
												<?php $retVal = (empty($data->logo)) ? 'logo2.jpg' : $data->logo ; ?>
												<img style="width:113px;" class="img-polaroid" src="<?php echo base_url('upload/'.$retVal)?>">
												<br />
		                    <input type="file" name="userfile">
										</div>
		            </div>

										<div class="control-group">
				                <div class="controls">
				                    <button type="submit" class="btn btn-primary">Simpan</button>
				                    <a href="<?php echo base_url('home') ?>" class="btn btn-default">Kembali</a>
				                </div>
				            </div>
									</form>
							</div>
						</div>
					</div><!--/.content-->
				</div>
