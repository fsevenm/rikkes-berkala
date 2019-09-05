<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rikkes Berkala">
    <meta name="author" content="Ayub Aswad">

    <title>Rikkes Berkala</title>

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
            <div class="col-lg-12" style="margin-top:20px">
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input autofocus type="text" id="inp-src" class="form-control" placeholder="Cari...">
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="row">
            <div id="ajax-loading" class="col-lg-12 text-center hidden">
                <img src="<?= base_url('assets/images/ajax-loader-rikkesberkala.gif') ?>"/>    
            </div>
        </div>

        <div class="row" id="cont-src-res">
            <!-- <a href="javascript:" data="1" data-toggle="modal" class="res-list"><div class="col-lg-12">
                <div class="well">
                    <h4>Nama User 1 #1022237</h4>
                </div>
            </div></a> -->
            <!-- <a href="javascript:" data="2" data-toggle="modal" class="res-list"><div class="col-lg-12">
                <div class="well">
                    <h4>Nama User 2 #1022237</h4>
                </div>
            </div></a> -->
            
        </div>
        <!-- /.row -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Detail data</h4>
                        </div>
                        <div class="modal-body">
                            <div id="det-ajax-loading" class="text-center hidden">
                                <img src="<?= base_url('assets/images/ajax-loader-rikkesberkala.gif') ?>"/>    
                            </div>
                            <dl id="cont-det" class="">
                                <dt>NRP</dt>
                                <dd style="margin-bottom:10px" id="det-nrp"></dd>
                                <dt>Nama</dt>
                                <dd style="margin-bottom:10px" id="det-nama"></dd>
                                <dt>Jabatan</dt>
                                <dd style="margin-bottom:10px" id="det-jabatan"></dd>
                                <dt>Keterangan</dt>
                                <textarea class="form-control" readonly rows="10" id="det-ket"></textarea>
                            </dl>
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

        $('#cont-src-res').on('click', '.res-list', function(event){
            // console.log($(this).attr('data'));
            var this_data = $(this);
            $.ajax({
                url: '<?= base_url('employee/single')?>',
                type: 'post',
                data: {
                    'employee-id': this_data.attr('data')
                },
                beforeSend: function(){
                    $('#det-ajax-loading').removeClass('hidden');
                    $('#cont-det').addClass('hidden');
                },
                success: function(data){
                    if (data == 'error') {
                        $('#det-ajax-loading').addClass('hidden');
                        $('#cont-det').removeClass('hidden');
                        $('#cont-det').html('<span class="text-muted">Tidak ada data</span>');                        
                    } else {
                        data = JSON.parse(data);
                        $('#det-nrp').html(data[0].nrp);
                        $('#det-nama').html(data[0].nama);
                        $('#det-jabatan').html(data[0].name);
                        $('#det-ket').val(data[0].keterangan);
                        $('#det-ajax-loading').addClass('hidden');
                        $('#cont-det').removeClass('hidden');
                    }
                }
            });           
            $('#myModal').modal('show');
        });
    
        $('#inp-src').keypress(function(e){
            if (e.which == 13)
            {
                $.ajax({
                    url: '<?= base_url('employee/search') ?>',
                    type: 'post',
                    data: {
                        'src-key': $('#inp-src').val()
                    },
                    beforeSend: function(){
                        $('#ajax-loading').removeClass('hidden');
                        $('#cont-src-res').html('').fadeOut('slow');
                    },
                    success: function(data){
                        $('#ajax-loading').addClass('hidden');
                        if (data == 'nodata') {
                            $('#cont-src-res').html('<div class="col-lg-12 text-muted text-center">Tidak ditemukan data dengan kata kunci tersebut</div>').fadeIn('slow');
                        } else {
                            data = JSON.parse(data);
                            // console.log(data);
                            // console.log(data.length);
                            // console.log(data[0].nama);
                            var data_container;
                            for (var i = 0; i < data.length; i++) {
                                data_container = '<a href="javascript:" data="'+data[i].id+'" data-toggle="modal" class="res-list"><div class="col-lg-12"><div class="well"><h4>'+ data[i].nama +' #'+ data[i].nrp +'</h4> </div> </div></a>';
                                $('#cont-src-res').append(data_container).fadeIn("slow");
                            }
                        }
                    }
                });
            }
        });

        $('#dataTables-example').DataTable({
            responsive: true
        });

    });
</script>

</body>

</html>

