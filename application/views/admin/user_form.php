<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>User Management - KepoAbis.com</title>

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
    

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "user"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Management
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>User Management
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <h2>Create new User</h2>
                 <div class="col-lg-8">
                        
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-2">Username</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Nama</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Role</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="role" name="role">
                                            <option value="superadmin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="crew">Crew</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Position</label>
                                    <div class="col-sm-6">
                                        <input type="test" class="form-control" id="position" name="position">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">Description</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3" name="body"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2">File input</label>
                                    <div class="col-sm-6">
                                        <input type="file">
                                    </div>
                                </div>
                            </form>
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href='<?php echo base_url(); ?>admin/user'>Cancel</a>
                        </div>
                        
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
