<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rikkes Berkala">
    <meta name="author" content="Ayub Aswad">

    <title>Rikkes Berkala</title>

    <link href="<?= base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login ke Rikkes Berkala</h3>
                    </div>
                    <div class="panel-body">
                        <?php if ($this->session->flashdata('type')):?>
                            <div class="alert alert-<?= $this->session->flashdata('type'); ?>" role="alert">
                                <strong><?php echo $this->session->flashdata('title'); ?></strong> <br> <br><?php echo $this->session->flashdata('msg'); ?>
                            </div>
                        <?php endif; ?>

                        <form role="form" method="post" action="<?=base_url()?>auth/login">
                            <fieldset>
                                <div class="form-group input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input class="form-control" value="<?= set_value('username')?>" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" value="1" class="btn btn-lg btn-success btn-block btn-login">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/plugins/metisMenu/metisMenu.min.js"></script>
<script src="<?= base_url()?>assets/js/sb-admin-2.js"></script>
<script>

</script>

</body>

</html>
