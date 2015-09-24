<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Comment Notification - KepoAbis.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "activity"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Activity History List
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>&nbsp;Activity History Listn
                            </li>
                        </ol>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                History List - <b>Dashboard KepoAbis.com</b>
                                <div class="btn-group pull-right">
                                    <a href="#"></a>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="comment-list">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>IP Address</th>
                                                <th>User Agent</th>
                                                <th>Activity</th>
                                                <th>Created Time</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    <!-- /.panel -->
                    </div>
                </div>
                 <!-- jQuery -->
                <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
                <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.dataTables.min.js'; ?>"></script>
                <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.dataTables.js'; ?>"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
                <script>
                    $(document).ready(function() {
                        var t = $('#comment-list').DataTable( {
                            "processing": true,
                            "ajax": "<?php echo base_url(); ?>admin/activity-history/ajax_",
                            "order": [[ 4, 'desc' ]],
                            "pagingType": "simple_numbers",
                            "columns": [
                                /*{ 
                                    "data": "id",
                                    "width": "120px",
                                    "sClass": "text-center"
                                },*/
                                { "data": "no" },
                                { "data": "user_name" },
                                { "data": "ip_address" },
                                { "data": "user_agent" },
                                { "data": "activity" },
                                { "data": "created_time" },
                            ]
                        } );
                        t.on('order.dt search.dt', function () {
                            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                cell.innerHTML = i+1;
                            } );
                        } ).draw();
                    } );
                </script>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   

</body>

</html>
