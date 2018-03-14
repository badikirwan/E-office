<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tambah Klasifikasi</h3>
							</div>
							<div class="module-body">
								<?php echo form_open('klasifikasi/add', 'class="form-horizontal row-fluid"') ?>
										<div class="control-group">
											<label class="control-label" for="basicinput">Kode</label>
											<div class="controls">
												<input type="text" id="basicinput" name="kode" required placeholder="Type something here..." class="span8">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nama</label>
											<div class="controls">
												<input type="text" id="basicinput" name="nama" required placeholder="Type something here..." class="span8">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Uraian</label>
											<div class="controls">
												<textarea class="span8" name="uraian" required rows="5"></textarea>
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
