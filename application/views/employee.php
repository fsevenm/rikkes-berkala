<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rikkes Berkala">
    <meta name="author" content="Ayub Aswad">

    <title>Data Pegawai - Rikkes Berkala</title>

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
            <h1 class="page-header">Pegawai</h1>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="pull-right">
                    <a href="<?= base_url()?>employee/add" class="btn btn-primary btn-xl"><i class="fa fa-plus"></i>&nbsp;Tambah Pegawai
                    </a>
                </p>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Daftar Pegawai
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>NRP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Keterangan</th>
                                <th>Tombol Aksi</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $counter = 1; ?>

                            <?php foreach ($employees as $employee): ?>

                                <tr class="<?php echo ($counter % 2) == 0 ? 'even gradeC' : 'odd gradeX' ?> ">
                                    <td><?= $employee->nrp?></td>
                                    <td><?= $employee->nama?></td>
                                    <td><?= $employee->name?></td>
                                    <td><textarea class="hidden"><?= $employee->keterangan ?></textarea><a href="javascript:" data-id="<?= $employee->id?>" class="btn btn-circle btn-success btn-keterangan" title="Lihat keterangan"><i class="fa fa-eye"></i></a></td>
                                    <td>
                                        <a href="<?= base_url() . 'employee/edit/' . $employee->id; ?>" class="btn btn-primary btn-circle" title="Ubah"><i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="javascript:" data-id="<?= $employee->id ?>" class="btn btn-danger btn-circle btn-delete" title="Hapus"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <?php $counter++; ?>

                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Keterangan pegawai</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        Nama: <span class="fwb"><strong id="nama"></strong></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-4">
                                    <p>
                                        NRP: <span class="fwb"><strong id="nrp"></strong></span>
                                    </p>
                                </div>
                                <div class="col-md-5">
                                    <p>
                                        Jabatan: <span class="fwb"><strong id="jabatan"></strong></span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Keterangan:</strong>
                                    <p id="keterangan">
                                    </p>
                                    <div id="edit-ket" class="hidden">
                                        <div class="form-group">
                                            <textarea style="resize: none;" class="form-control" id="ta-keterangan" rows="8"></textarea>
                                        </div>
                                        <div class="form-group pull-right">
                                            <button class="btn btn-success" id="btn-save">Simpan</button>
                                            <button class="btn btn-default" id="btn-cancel">Batal</button>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


    </div>
</div>
    <!-- /#page-wrapper
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

        $('#dataTables-example').DataTable({
            responsive: true
        });

        var id, nama, nrp, jabatan, keterangan, edited_elem;

        $('.btn-keterangan').click(function(){
            edited_elem = $(this);
            id = $(this).attr('data-id');
            nrp = $(this).closest('tr').children('td:eq(0)').text();
            nama = $(this).closest('tr').children('td:eq(1)').text();
            jabatan = $(this).closest('tr').children('td:eq(2)').text();
            keterangan = $(this).closest('tr').find('td:eq(3) textarea').val();

            $('#nrp').html(nrp);
            $('#nama').html(nama);
            $('#jabatan').html(jabatan);
            $('#keterangan').html(keterangan + '&nbsp; <a href="javascript:" id="btn-edit-ket" data-id="'+id+'" class="text-primary"><i class="fa fa-pencil"></i></a>');
            $('#ta-keterangan').val(keterangan);
            // console.log($('#ta-keterangan').html());

            $('#edit-ket').addClass('hidden');
            $('#keterangan').removeClass('hidden');

            $('#myModal').modal('show');
        });

        $('#keterangan').on('click', '#btn-edit-ket', function(){
            $('#ta-keterangan').val(keterangan);            
            $('#edit-ket').removeClass('hidden');     
            $('#keterangan').addClass('hidden');
            $('#ta-keterangan').focus();    
        });

        $('#btn-cancel').click(function(){
            $('#ta-keterangan').val(keterangan);            
            $('#edit-ket').addClass('hidden');
            $('#keterangan').removeClass('hidden');
        });

        $('#btn-save').click(function(){
            $.ajax({
                url: '<?= base_url('employee/editketerangan')?>',
                type: 'post',
                data: {
                    'id': id,
                    'keterangan': $('#ta-keterangan').val()
                },
                success: function(data){
                    console.log(data);
                    if (data.trim() == '200')
                    {
                        console.log('eeg');
                        keterangan = $('#ta-keterangan').val();
                        $('#edit-ket').addClass('hidden');
                        $('#keterangan').removeClass('hidden');
                        edited_elem.closest('tr').find('td:eq(3) textarea').val(keterangan);
                        $('#keterangan').html(keterangan + '&nbsp; <a href="javascript:" id="btn-edit-ket" data-id="'+id+'" class="text-primary"><i class="fa fa-pencil"></i></a>');
                    }
                }
            });
        }); 

        $('.btn-delete').click(function(){
            nama = $(this).closest('tr').children('td:eq(1)').text();
            id = $(this).data('id');

            if (window.confirm('Hapus pegawai: ' + nama + ' ?') == true)
            {
                top.location = "<?= base_url('employee/delete')?>/" + id;
            }
        });

    });
</script>

</body>

</html>

