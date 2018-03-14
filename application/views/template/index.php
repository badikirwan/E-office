
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Office - Universitas Yudharta Pasuruan</title>
        <link type="text/css" href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/')?>css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/')?>images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/')?>jquery/jquery-ui.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/')?>css/flash.css" rel="stylesheet">
        <script src="<?php echo base_url('assets/')?>jquery/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>jquery/jquery-ui.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a>
                        <img style="width:40px; margin-top: 10px"src="<?php echo base_url('assets/images/app_logo.png')?>" class="pull-left"/>
                        <a style="margin-top:10px"class="brand" href="<?php echo base_url()?>">E-Office | Yudharta</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                          <ul class="nav nav-icons">
                            <li class=""><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                          </ul>
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php $foto = $this->session->userdata('admin_foto') ?>
                                <?php $retVal = (empty($foto)) ? 'user.png' : $foto ; ?>
                                <img src="<?php echo base_url('upload/foto/'.$retVal)?>" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('auth/logout')?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="<?= base_url('home')?>"><i class="menu-icon icon-home"></i>Beranda
                                </a></li>
                                <li><a href="<?= base_url('klasifikasi')?>"><i class="menu-icon icon-bullhorn"></i>Klasifikasi Surat </a>
                                </li>
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-book">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Buku Agenda </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="<?php echo base_url('agenda/surat_masuk') ?>"><i class="icon-envelope"></i> Surat Masuk</a></li>
                                        <li><a href="<?php echo base_url('agenda/surat_keluar') ?>"><i class="icon-envelope"></i> Surat Keluar </a></li>
                                    </ul>
                                </li>
                                <?php if ($this->session->userdata('admin_level') == 'Administrator'): ?>
                                  <li><a class="collapsed" data-toggle="collapse" href="#togglePages1"><i class="menu-icon icon-book">
                                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                  </i>Arsip Surat </a>
                                      <ul id="togglePages1" class="collapse unstyled">
                                          <li><a href="<?php echo base_url('arsip/surat_masuk') ?>"><i class="icon-envelope"></i> Surat Masuk</a></li>
                                          <li><a href="<?php echo base_url('arsip/surat_keluar') ?>"><i class="icon-envelope"></i> Surat Keluar </a></li>
                                      </ul>
                                  </li>
                                <?php endif; ?>
                                <li><a href="<?php echo base_url('surat_masuk') ?>"><i class="menu-icon icon-inbox"></i>Surat Masuk <b class="label green pull-right">
                                    11</b> </a></li>
                                <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Surat Keluar <b class="label orange pull-right">
                                    19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->

                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                              <?php if ($this->session->userdata('admin_level') == 'Administrator'): ?>
                                <li><a class="collapsed" data-toggle="collapse" href="#setting"><i class="menu-icon icon-wrench">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Pengaturan </a>
                                    <ul id="setting" class="collapse unstyled">
                                        <li><a href="<?php echo base_url('instansi') ?>"><i class="icon-inbox"></i> Instansi</a></li>
                                        <li><a href="<?php echo base_url('akun') ?>"><i class="icon-user"></i> Pengguna </a></li>
                                    </ul>
                                </li>
                              <?php endif; ?>
                                <li><a href="<?php echo base_url('auth/logout')?>"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <?php $this->load->view('template/'.$page); ?>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer" style="padding:30px">
            <div class="container" style="text-align: center;">
                <b class="copyright">&copy; 2018 E-Office - Universitas Yudharta Pasuruan </b>
            </div>
        </div>
        <script type="text/javascript">
        var baseurl = "<?php print base_url(); ?>";
        </script>
        <script src="<?php echo base_url('assets/')?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>scripts/js/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>jquery/jquery-ui.css" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>scripts/common.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/')?>scripts/pace.min.js" type="text/javascript"></script>




    </body>
