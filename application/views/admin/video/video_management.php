<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Video Management - KepoAbis.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <?php echo Tb::modal(array(
        'id' => 'modal_confirm',
        'header' => 'Delete',
        'body' => '<strong>Apakah Anda yakin ingin menghapus video ini?</strong>',
        'footer' => array(
            Tb::button('Ya', array('onclick' => "deleted('video')", 'color' => Tb::BUTTON_COLOR_WARNING)),
            TB::button('Tidak', array('data-dismiss' => 'modal'))
        )
    ));
    ?>
    <?php echo Tb::modal(array(
        'id' => 'modal_approve',
        'header' => 'Approve',
        'body' => '<strong>Apakah Anda yakin ingin meng-approve video ini?</strong>',
        'footer' => array(
            Tb::button('Ya', array('onclick' => "approve('video')", 'color' => Tb::BUTTON_COLOR_WARNING)),
            TB::button('Tidak', array('data-dismiss' => 'modal'))
        )
    ));
    ?>
    <script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "video"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Video Management
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>&nbsp;Video List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                 <div class="col-lg-12">
                        <h2>Video List - <strong>KepoAbis.com</strong></h2>
                        {success}
                        <div class="row">
                            <form action="<?php echo base_url(); ?>admin/video/filter" method="get">
                            <div class="col-sm-3">
                                <input type="text" class="form-control" value="" name="title" placeholder="Video Title">
                            </div><button type="submit" name="submit" value="s" id="filter" class="btn btn-primary">Filter</button>
                            </form>
                        </div><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Video Title</th>
                                        <th>Status</th>
                                        <th>URL</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {list_video}
                                </tbody>
                            </table>
                            {link}<br><br>
                        </div>
                        <a href='<?php echo base_url(); ?>admin/video/create' class="btn btn-lg btn-success">Add Video</a>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>

</html>
