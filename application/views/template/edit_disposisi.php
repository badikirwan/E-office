<div class="span9">
	<div class="content">

		<div class="module">
			<div class="module-head">
				<h3>Tambah Disposisi</h3>
			</div>
			<div class="module-body">
				<?php $uri3 = $this->uri->segment(3) ?>
				<?php echo form_open_multipart('disposisi/edit/'.$data->id, 'class="form-horizontal row-fluid"') ?>
				<input type="hidden" name="id_user" id="id_user" value="<?php echo $data->id_user?>">
				<input type="hidden" name="id_surat" value="<?php echo $data->id_surat?>">
				<div class="control-group">
					<label class="control-label">Tujuan Disposisi <span class="text-error">*</span></label>
					<div class="controls">
						<input type="text" id="tujuan-disposisi" name="tujuan" class="span5" value="<?php echo set_value('tujuan', $data->kpd_yth)?>">
						<?php echo form_error('tujuan', '<div class="text-error">', '</div>'); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="basicinput">Sifat <span class="text-error">*</span></label>
					<div class="controls">
						<select tabindex="1" data-placeholder="Select here.." class="span5" name="sifat">
							<option value="">- Pilih -</option>
							<option value="Biasa">Biasa</option>
							<option value="Segera">Segera</option>
							<option value="Perlu Perhatian Khusus">Perlu perhatian khusus</option>
							<option value="Perhatian Batas Waktu">Perhatian batas waktu</option>
						</select>
						<?php echo form_error('sifat', '<div class="text-error">', '</div>'); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Batas Waktu <span class="text-error">*</span></label>
					<div class="controls">
						<input type="text" class="span5" id="tgl_start" name="batas_waktu" value="<?php echo set_value('batas_waktu', $data->batas_waktu)?>">
						<?php echo form_error('batas_waktu', '<div class="text-error">', '</div>'); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Isi Disposisi <span class="text-error">*</span></label>
					<div class="controls">
						<textarea type="text" name="isi_disposisi" class="span8"><?php echo set_value('isi_disposisi', $data->isi_disposisi)?></textarea>
						<?php echo form_error('isi_disposisi', '<div class="text-error">', '</div>'); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Catatan <span class="text-error">*</span></label>
					<div class="controls">
						<textarea type="text" name="catatan" class="span8"><?php echo set_value('catatan', $data->catatan)?></textarea>
						<?php echo form_error('catatan', '<div class="text-error">', '</div>'); ?>
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
