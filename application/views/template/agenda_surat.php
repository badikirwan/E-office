<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3><?php echo $title?></h3>
							</div>
							<div class="module-body">
								<?php $retVal = ($this->uri->segment(2) == 'surat_masuk') ? 'cetak_agenda_masuk' : 'cetak_agenda_keluar' ; ?>
								<?php echo form_open_multipart('agenda/'.$retVal, 'class="form-horizontal row-fluid" target=blank') ?>
								<div class="control-group">
										<label class="control-label">Dari Tanggal <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="tgl_start" class="span5 datepicker" id="tgl_start" required>
										</div>
								</div>
								<div class="control-group">
										<label class="control-label">Sampai Tanggal <span class="text-error">*</span></label>
										<div class="controls">
												<input type="text" name="tgl_end" class="span5" id="tgl_end" required>
										</div>
								</div>

										<div class="control-group">
				                <div class="controls">
				                    <button type="submit" class="btn btn-primary">Cetak Agenda</button>
				                    <a href="<?php echo base_url('home')?>" class="btn btn-default">Kembali</a>
				                </div>
				            </div>
									</form>
							</div>
						</div>
					</div><!--/.content-->
				</div>
