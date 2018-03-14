<?php
$mode		= $this->uri->segment(2);

if ($mode == "edit" || $mode == "act_edt") {
	$act		= "act_edt";
	$idp		= $data->id;
	$kode		= $data->kode;
	$nama		= $data->nama;
	$uraian		= $data->uraian;
} else {
	$act		= "act_add";
	$idp		= "";
	$kode		= "";
	$nama		= "";
	$uraian		= "";
}
?>
<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Edit Klasifikasi</h3>
							</div>
							<div class="module-body">
								<?php echo form_open('klasifikasi/edit/'.$idp, 'class="form-horizontal row-fluid"') ?>
										<div class="control-group">
											<label class="control-label" for="basicinput">Kode</label>
											<div class="controls">
												<input type="text" id="basicinput" name="kode" required value="<?php echo $kode ?>"placeholder="Type something here..." class="span8">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nama</label>
											<div class="controls">
												<input type="text" id="basicinput" name="nama" required value="<?php echo $nama?>" placeholder="Type something here..." class="span8">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Uraian</label>
											<div class="controls">
												<textarea class="span8" name="uraian" required rows="5"><?php echo $uraian ?></textarea>
											</div>
										</div>

										<div class="control-group">
				                <div class="controls">
				                    <button type="submit" class="btn btn-primary">Update</button>
				                    <a href="<?php echo base_url('klasifikasi')?>" class="btn btn-default">Kembali</a>
				                </div>
				            </div>
									</form>
							</div>
						</div>



					</div><!--/.content-->
				</div>
