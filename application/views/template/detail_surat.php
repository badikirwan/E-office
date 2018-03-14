<div class="span7">
	<div class="content">
		<div class="module">
			<div class="module-head">
				<h3>Detail surat</h3>
			</div>
			<div class="module-body">
				<div class="form-horizontal row-fluid">
					<div class="control-group">
						<label class="control-label" style="text-align: left"><b>No.Agenda / Kode</b></label>
						<div class="controls">
							<label class="control-label" style="text-align: left"><b>:</b>  <?php echo $data->no_agenda?> / <?php echo $data->kode?> </label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="text-align: left"><b>No.Surat</b></label>
						<div class="controls">
							<label class="control-label" style="text-align: left; width: auto;"><b>:</b>  <?php echo $data->no_surat?> </label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="text-align: left"><b>Asal Surat</b></label>
						<div class="controls">
							<label class="control-label" style="text-align: left; width: auto;"><b>:</b>  <?php echo $data->dari?></label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="text-align: left"><b>Tgl.Surat</b></label>
						<div class="controls">
							<label class="control-label" style="text-align: left; width: auto;"><b>:</b>  <?php echo $data->tgl_surat?> </label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="text-align: left"><b>Isi Ringkas</b></label>
						<div class="controls">
							<label class="control-label" style="text-align: left; width: auto;"><b>:</b>  <?php echo $data->isi_ringkas?></label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="text-align: left"><b>Keterangan</b></label>
						<div class="controls">
							<label class="control-label" style="text-align: left; width: auto;"><b>:</b>  <?php echo $data->keterangan?> </label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" style="text-align: left"><b>File</b></label>
						<div class="controls">
							<b>:</b>  <a href="<?php echo base_url('upload/surat_masuk/'.$data->file)?>" target="_blank">Lihat file</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="span2" style="width:140px">
	<div class="content">
		<div class="module">
			<div class="module-head">
				<h3>Aksi</h3>
			</div>
			<div class="module-body" style="text-align:center">
				<a href="<?php echo base_url('disposisi/index/'.$data->id)?>" class="btn btn-success" style="margin-bottom:5px">Disposisikan</a>
				<a href="<?php echo base_url('surat_masuk')?>" class="btn btn-default" style="margin-bottom:5px">Kembali</a>

			</div>
		</div>
	</div>
</div>
