<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rikkes Berkala">
    <meta name="author" content="Ayub Aswad">

    <title>Jabatan - Rikkes Berkala</title>

    <link href="<?= base_url()?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/css/mystyle.css" rel="stylesheet" type="text/css">

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

        <?= view_sidebar(); ?>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Jabatan Pegawai</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <h4>Daftar jabatan</h4>
                                <div class="list-group" id="list-jabatan">
                                    <?php foreach ($jabatans as $jabatan):?>
                                    <div class="list-group-item">
                                        <?= $jabatan->name; ?> 
                                        <a href="javascript:" title="Ubah" data="<?= $jabatan->id; ?>"><i class="btn-edit fa fa-pencil fa-fw"></i></a>
                                        <a href="javascript:" title="Hapus" data="<?= $jabatan->id; ?>"><i class="btn-delete fa fa-trash fa-fw pull-right text-danger"></i></a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <hr>
                                <h4 id="ttl-edit-add">Tambah baru</h4>
                                <form role="form" action="#">
                                    
                                    <div class="form-group">
                                        <input type="hidden" id="inp-id" value="0">
                                        <input type="text" id="inp-name" name="name" class="form-control" placeholder="Masukkan nama jabatan">
                                    </div>

                                    <div class="form-group">
                                        <a href="javascript:" id="btn-cancel" class="btn btn-xl btn-default hidden">Batal</a>                                        
                                        <a href="javascript:" id="btn-save" class="btn btn-xl btn-primary">Simpan</a>
                                    </div>
                                
                                </form>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
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
    <?= view_footer_content(); ?>
</div>


<script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?= base_url()?>assets/plugins/metisMenu/metisMenu.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/plugins/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?= base_url()?>assets/js/sb-admin-2.js"></script>

<script>

    $(document).ready(function() {

        var onchange_data, ondelete_data;

        $('#inp-name').on('keyup', function(e){
            if (e.which == 27)
            {
                if ($('#inp-id').val() != '0'){
                    $('#btn-cancel').click();
                }
                else {
                    $(this).val('').blur();
                }
            }
        });

        $('#inp-name').keypress(function(e){
            // console.log(e.keyCode);
            if (e.which == 13) {
                e.preventDefault();
                $('#btn-save').click();
            }
        });

        $('#btn-save').click(function(){
            if ($('#inp-name').val().trim() != '')
            {
                // console.log('running');
                // var new_list = '<div class="list-group-item">'+$('#inp-name').val()+'<a href="javascript:" data="'+'ss'+'"><i class="fa fa-pencil fa-fw"></i></a><a href="javascript:" data="'+'ll'+'"><i class="fa fa-trash fa-fw pull-right text-danger"></i></a></div>';
                // $('#list-jabatan').append(new_list);
                if ($('#inp-id').val() != '0'){
                    $.ajax({
                        url: '<?= base_url('jabatan/edit')?>',
                        type: 'post',
                        data: {
                            'name': $('#inp-name').val(),
                            'id': $('#inp-id').val()
                        },
                        success: function(data){
                            if (data == '200')
                            {
                                var change_list = ''+$('#inp-name').val()+'<a href="javascript:" title="Ubah" data="'+$('#inp-id').val()+'"><i class="btn-edit fa fa-pencil fa-fw"></i></a><a href="javascript:" title="Hapus" data="'+$('#inp-id').val()+'"><i class="btn-delete fa fa-trash fa-fw pull-right text-danger"></i></a>';                                
                                onchange_data.closest('div').html(change_list);
                                $('#inp-name').val('').blur();
                                $('#btn-cancel').addClass('hidden');
                                $('#inp-id').val('0');
                                $('#ttl-edit-add').html('Tambah baru');
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: '<?= base_url('jabatan/add')?>',
                        type: 'post',
                        data: {
                            'name': $('#inp-name').val()
                        },
                        success: function(data){
                            if (data != 0 || data != '')
                            {
                                var new_list = '<div class="list-group-item">'+$('#inp-name').val()+'<a href="javascript:" title="Ubah" data="'+data+'"><i class="btn-edit fa fa-pencil fa-fw"></i></a><a href="javascript:" title="Hapus" data="'+data+'"><i class="btn-delete fa fa-trash fa-fw pull-right text-danger"></i></a></div>';
                                $('#list-jabatan').append(new_list);
                                $('#inp-name').val('');
                            }
                        }
                    });
                }
            }
        });

        $('#list-jabatan').on('click', '.btn-edit', function(){
            onchange_data = $(this);
            var name = $(this).closest('div').text().trim();
            $('#inp-name').val(name);
            $('#inp-name').focus();
            $('#inp-id').val($(this).closest('a').attr('data'));
            $('#btn-cancel').removeClass('hidden');
            $('#ttl-edit-add').html('Ubah');
            // console.log($(this).closest('a').attr('data'));
        }); 

        $('#list-jabatan').on('click', '.btn-delete', function(){
            var id = $(this).closest('a').attr('data');
            var name = $(this).closest('div').text().trim();
            ondelete_data = $(this);
            if (window.confirm('Hapus jabatan: ' + name + ' ?') == true)
            {
                $.ajax({
                        url: '<?= base_url('jabatan/delete')?>',
                        type: 'post',
                        data: {
                            'id': id
                        },
                        success: function(data){
                            if (data == '200')
                            {
                                ondelete_data.closest('div').remove();
                            }
                        }
                    });
            }
        });

        $('#btn-cancel').click(function(){
            $(this).addClass('hidden');
            $('#inp-id').val('0');
            $('#inp-name').val('').blur();
            $('#ttl-edit-add').html('Tambah baru');
        });

    });
</script>

</body>

</html>

