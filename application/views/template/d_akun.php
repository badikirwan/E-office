<div class="span9">
                  <div class="content">
                      <div class="module">
                          <div class="module-head">
                              <h3>Detail Pengguna</h3>
                          </div>
													<div class="module-body">
															<div class="panel panel-default">
																<div class="panel-heading">
																	<strong>Profil pengguna </strong>
																</div>
																<div class="panel-body" style="padding:0px;">
																	<table class="table">
																		<tr>
																			<th bgcolor="#f5f5f5" width="25%" style="border-top: 0px;">Nama</th>
																			<td style="border-top: 0px;"> <?php echo $data->nama?> </td>
																			<td rowspan="3" width="25%" style="border-top: 0px; padding-left: 50px">
																					<?php $retVal = (empty($data->foto)) ? 'user.png' : $data->foto ; ?>
																				 <img style="width:113px;" class="img-polaroid" src="<?php echo base_url('upload/foto/'.$retVal)?>"/>
																			</td>
																		</tr>
																		<tr>
																			<th bgcolor="#f5f5f5" width="25%">NIP</th>
																			<td> <?php echo $data->nip?> </td>
																		</tr>
																		<tr>
																			<th bgcolor="#f5f5f5" width="25%">Jabatan</th>
																			<td> <?php echo $data->jabatan?> </td>
																		</tr>


																	</table>
																</div>
															</div>
															<div class="row-fluid">
															<div class="span6">
																<div class="panel panel-default">
																	<div class="panel-heading">
																		<strong>Akun login </strong>
																	</div>
																	<div class="panel-body" style="padding:0px;">
																		<table class="table">
																			<tr>
																				<th bgcolor="#f5f5f5" width="52%" style="border-top: 0px;">Username</th>
																				<td style="border-top: 0px;"> <?php echo $data->username?></td>
																			</tr>
																			<tr>
																				<th bgcolor="#f5f5f5" width="52%">Password</th>
																				<td> <?php echo $data->password?> </td>
																			</tr>


																		</table>
																	</div>
																</div>
															</div>
														</div>

													</div>

									        	</div>
                          </div>
                      </div>
                  </div>
                  <!--/.content-->
              </div>
