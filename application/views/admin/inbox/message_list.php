<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Inbox Message - KepoAbis.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
    <style>
        div.container {
            margin: 0 auto;
            max-width:760px;
        }
        div.header {
            margin: 100px auto;
            line-height:30px;
            max-width:760px;
        }
        
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
    <?php echo Tb::modal(array(
        'id' => 'modal_confirm',
        'header' => 'Delete',
        'body' => '<strong>Apakah Anda yakin ingin memghapus message ini?</strong>',
        'footer' => array(
            Tb::button('Ya', array('onclick' => "deleted('delete')", 'color' => Tb::BUTTON_COLOR_WARNING)),
            TB::button('Tidak', array('data-dismiss' => 'modal'))
        )
    ));
    ?>
    <?php echo Tb::modal(array(
        'id' => 'modal_read',
        'header' => 'Detail Message',
        'body' => $this->load->view('admin/inbox/detail_message', array(), true),
    )); ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "inbox_message"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Inbox Message
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>&nbsp;Inbox Message
                            </li>
                        </ol>
                        <?php echo $success; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Message List - <b>KepoAbis.com</b>
                                <div class="btn-group pull-right">
                                    <a href="#"></a>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="message-list">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>From</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>IP Address</th>
                                                <th>Created Time</th>
                                                <th>More</th>
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
                        var t = $('#message-list').DataTable( {
                            "processing": true,
                            "ajax": "<?php echo base_url(); ?>admin/inbox-message/get_list_message",
                            "order": [[ 3, 'desc' ]],
                            "pagingType": "simple_numbers",
                            "columns": [
                                { "data": "no" },
                                { "data": "from_name" },
                                { "data": "email" },
                                { "data": "subject" },
                                { "data": "message" },
                                { "data": "ip_address" },
                                { "data": "created_time" },
                                { "data": "action" },
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
