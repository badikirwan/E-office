<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tambah Akun</h3>
							</div>
							<div class="module-body">
								<?php echo form_open_multipart('akun/edit/1', 'class="form-horizontal row-fluid"') ?>
								<div class="control-group">
										<label class="control-label">Nama <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="nama" class="span8" value="<?php echo set_value('nama', $data->nama)?>">
												<?php echo form_error('nama', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">NIP <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="nip" class="span8" value="<?php echo set_value('nip', $data->nip)?>">
												<?php echo form_error('nip', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Jabatan <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="jabatan" class="span8" value="<?php echo set_value('jabatan', $data->jabatan)?>">
												<?php echo form_error('jabatan', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Username <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="username" class="span5" value="<?php echo set_value('username', $data->username)?>">
												<?php echo form_error('username', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Password <span class="text-error">*</span></label>
										<div class="controls">
												<input type="password" name="password" id="InputPass" class="span5" value="<?php echo set_value('password')?>">
												<?php echo form_error('password', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Konfirmasi password <span class="text-error">*</span></label>
										<div class="controls">
												<input type="password" name="password2" class="span5">
												<br />
												<?php echo form_error('password2', '<div class="text-error">', '</div>'); ?>
												<label class="checkbox inline">
													<input type="checkbox" onchange="document.getElementById('InputPass').type = this.checked ? 'text' : 'password'"> show password</label>
												
										</div>
								</div>
								<div class="control-group">
											<label class="control-label">Level <span class="text-error">*</span></label>
											<div class="controls">
												<?php
												 $level = 'Administrator';
												 $retVal = ($data->level == $level) ? TRUE : FALSE ; ?>
												<label class="radio inline">
													<input type="radio" name="level" id="optionsRadios1" value="Administrator" <?php echo set_radio('level', $data->level, $retVal); ?>>
													Administrator
												</label>
												<?php
												 $level = 'Resepsionis';
												 $retVal = ($data->level == $level) ? TRUE : FALSE ; ?>
												<label class="radio inline">
													<input type="radio" name="level" id="optionsRadios2" value="Resepsionis" <?php echo set_radio('level', $data->level, $retVal); ?>>
													Resepsionis
												</label>
												<?php
												 $level = 'Rektor';
												 $retVal = ($data->level == $level) ? TRUE : FALSE ; ?>
												<label class="radio inline">
													<input type="radio" name="level" id="optionsRadios3" value="Rektor" <?php echo set_radio('level', $data->level, $retVal); ?>>
													Rektor
												</label>
												<?php
												 $level = 'User';
												 $retVal = ($data->level == $level) ? TRUE : FALSE ; ?>
												<label class="radio inline">
													<input type="radio" name="level" id="optionsRadios3" value="User" <?php echo set_radio('level', $data->level, $retVal); ?>>
													User
												</label>
											</div>
										</div>
								<div class="control-group">
				            <label class="control-label">Foto</label>
				              <div class="controls">
												<?php $retVal = (empty($data->foto)) ? 'user.png' : $data->foto ; ?>
											 <img style="width:113px;" class="img-polaroid" src="<?php echo base_url('upload/foto/'.$retVal)?>"/>
											 <br />
											 <input type="file" name="userfile">
											 <?php echo form_error('userfile', '<div class="text-error">', '</div>'); ?>
				              </div>
				        </div>

										<div class="control-group">
				                <div class="controls">
				                    <button type="submit" class="btn btn-primary">Simpan</button>
				                    <a href="<?php echo base_url('klasifikasi')?>" class="btn btn-default">Kembali</a>
				                </div>
				            </div>
									</form>
							</div>
						</div>
					</div><!--/.content-->
				</div>
