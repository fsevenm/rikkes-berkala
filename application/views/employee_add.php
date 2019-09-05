<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rikkes Berkala">
    <meta name="author" content="Biddokes">

    <title>Tambah Pegawai - Rikkes Berkala</title>

    <!--    <link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/bootstrap.min.css">-->
    <link href="<?= base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/select2/select2-bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/mystyle.css">
    <!--    <link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/gh-pages.css">-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Navigasi</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url()?>">Rikkes Berkala</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown" style="padding-left: 10px;">
                <em><?= $this->session->userdata('rikkesname')?></em>
            </li>
            <li class="divider"></li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?=base_url()?>editprofil"><i class="fa fa-user fa-fw"></i> Ubah Profil</a>
                    </li>
                    <li><a href="<?=base_url()?>editpassword"><i class="fa fa-key fa-fw"></i> Ubah Password</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?=base_url()?>auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <?= view_sidebar() ?>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Pegawai</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if ($this->session->flashdata('type')):?>
                            <div class="alert alert-<?= $this->session->flashdata('type'); ?>" role="alert">
                                <strong><?php echo $this->session->flashdata('title'); ?></strong> <br> <br><?php echo $this->session->flashdata('msg'); ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('employee/p_add')?>" method="post" role="form">

                            <div class="form-group">
                                <label>NRP</label>
                                <input class="form-control" name="nrp" type="text" value="<?php echo set_value('nrp');  ?>" placeholder="NRP">
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama');  ?>" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="jabatan" class="form-control">
                                    <option value="">Pilih jabatan</option>
                                    <?php foreach($jabatans as $jabatan):?>
                                    <option value="<?= $jabatan->id; ?>" <?php echo set_select('jabatan', $jabatan->id); ?>><?= $jabatan->name; ?></option>                                    
                                    <?php endforeach;  ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="10" placeholder="Tambahkan keterangan"><?php echo set_value('keterangan');  ?></textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <button type="button" class="btn btn-xl btn-default btn-cancel">Batal</button>
                                <button type="submit" class="btn btn-xl btn-primary">Simpan</button>
                            </div>

                        </form>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<div class="panel-footer">
    <?= view_footer_content() ?>
</div>

<script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script src="<?= base_url()?>assets/plugins/select2/select2.full.js"></script>
<script src="<?= base_url()?>assets/plugins/select2/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/plugins/metisMenu/metisMenu.min.js"></script>
<script src="<?= base_url()?>assets/js/sb-admin-2.js"></script>
<script>
    $(document).ready(function() {

        $('.btn-cancel').click(function () {
            history.back();
        });

    });
</script>

</body>

</html>

