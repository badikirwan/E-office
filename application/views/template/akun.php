<div class="span9">
                  <div class="content">
                      <div class="module">
                          <div class="module-head">
                              <h3>
                                  Akun Pengguna</h3>
                          </div>
                          <div class="module-option clearfix" style="border-bottom: 0px">
                                <?php echo $this->session->flashdata("notif");?>
															<div class="btn-group pull-left" data-toggle="buttons-radio">
																<a href="<?php echo base_url('akun/add/1')?>" class="btn btn-primary"><i class="icon-plus-sign"></i> Tambah</a>
															</div>
                              <form>
                              <div class="input-append pull-right">
                                  <input type="text" class="span3" placeholder="Cari berdasarkan nama...">
                                  <button type="submit" class="btn">
                                      <i class="icon-search"></i>
                                  </button>
                              </div>
                              </form>
                          </div>
														<table class="table table-striped">
														  <tbody>
															<?php foreach ($data as $key) : ?>
																<tr>
																	<td width="50%"style="padding-left: 30px; ">
                                    <?php $retVal = (empty($key->foto)) ? 'user.png' : $key->foto ; ?>
							                        <img style="height:40px;width:40px; margin-right: 10px;" class="img-polaroid img-circle pull-left" src="<?php echo base_url('upload/foto/'.$retVal)?>">
							                        <b><?php echo $key->nama?></b><br> <?php echo $key->jabatan?>
							                    </td>
																	<td width="30%" style="padding-right: 30px; padding-top: 20px">
																		<span class="label label-success"><?php echo $key->level?></span>
																	</td>
																	<td width="20%" style="padding-top: 15px">
																		<div class="btn-group">
																			<a class="btn btn-default btn-small" href="<?php echo base_url('akun/detail/'.$key->id) ?>" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-eye-open"></i></a>
                                      <a class="btn btn-default btn-small" href="<?php echo base_url('akun/edit/'.$key->id) ?>" data-toggle="tooltip" title="" data-original-title="Edit"><i class="icon-edit"></i></a>
                                      <a onclick="return confirm('Anda yakin ingin menghapus ?')" class="btn btn-default btn-small" href="<?php echo base_url('akun/delete/'.$key->id) ?>" data-toggle="tooltip" title="" data-original-title="Hapus"><i class="icon-trash"></i></a>
								                    </div>
						                    </td>
																</tr>
															<?php endforeach ?>
														  </tbody>
														</table>
                              <br>
															<div class="row-fluid">
																<div class="span5">

									                </div>
									              <div class="span7"><div class="pagination pull-right" style="margin-top:0px;">
									                <ul><?php echo $pagi; ?></ul>
									              </div>
									            </div>
									        	</div>
                          </div>
                      </div>
                  </div>
                  <!--/.content-->
              </div>
