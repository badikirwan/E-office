<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tambah Akun</h3>
							</div>
							<div class="module-body">
								<?php echo form_open_multipart('akun/add/1', 'class="form-horizontal row-fluid"') ?>
								<div class="control-group">
										<label class="control-label">Nama <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="nama" class="span8" value="<?php echo set_value('nama')?>">
												<?php echo form_error('nama', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">NIP <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="nip" class="span8" value="<?php echo set_value('nip')?>">
												<?php echo form_error('nip', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Jabatan <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="jabatan" class="span8" value="<?php echo set_value('jabatan')?>">
												<?php echo form_error('jabatan', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Username <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="username" class="span5" value="<?php echo set_value('username')?>">
												<?php echo form_error('username', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Password <span class="text-error">*</span></label>
										<div class="controls">
												<input type="password" id="InputPass" name="password" class="span5" value="<?php echo set_value('password')?>">
												<?php echo form_error('password', '<div class="text-error">', '</div>'); ?>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Konfirmasi password <span class="text-error">*</span></label>
										<div class="controls">
												<input type="password" id="InputPass" name="password2" class="span5">
												<br />
												<?php echo form_error('password2', '<div class="text-error">', '</div>'); ?>
												<label class="checkbox inline">
													<input type="checkbox" onchange="document.getElementById('InputPass').type = this.checked ? 'text' : 'password'"> show password</label>

										</div>
								</div>
								<div class="control-group">
											<label class="control-label">Level <span class="text-error">*</span></label>
											<div class="controls">
												<label class="radio inline">
													<input type="radio" name="level" id="optionsRadios1" value="Administrator" checked="">
													Administrator
												</label>
												<label class="radio inline">
													<input type="radio" name="level" id="optionsRadios2" value="Resepsionis">
													Resepsionis
												</label>
												<label class="radio inline">
													<input type="radio" name="level" id="optionsRadios3" value="Rektor">
													Rektor
												</label>
												<label class="radio inline">
													<input type="radio" name="level" id="optionsRadios3" value="User">
													User
												</label>
											</div>
										</div>
								<div class="control-group">
		                <label class="control-label">Foto</label>
		                <div class="controls">
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
