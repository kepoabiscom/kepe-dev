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
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>Detail Video
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <h2>Detail Video</h2><br>
                <div class="col-lg-8">
                    <div class="row clearfix">
                        <div class="col-md-18 column"> <br>
                            <table class="table">
                                <tbody>
                                <td>
                                    <tr>
                                        <td align="left"><strong>Title</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{title}   
                                    </td>
                                        
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Tag<strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{tag} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Category</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{title_category} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Story Ide</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{story_ide} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Film Director</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{film_director} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Script Writer</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{screenwriter} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Cameramen</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{cameramen} </td>
                                    </tr>
                                  
                                    <tr>
                                        <td align="left"><strong>Video Review</strong></td><td align="left">&nbsp;&nbsp;&nbsp; {url}
                                       </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Duration</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{duration} </td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Status</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{status}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Artist</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{artist} </td>
                                    </tr>
                                    <tr>
                                        <td align="justify" ><strong>Description</strong></td>
                                        <td align="justify">&nbsp;&nbsp;&nbsp;{description}</td>
                                    </tr>
                                     <tr>
                                        <td align="left"><strong>Image Video</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{image}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Created Date</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{created_date}</td>
                                    </tr>
                                    <tr>
                                        <td align="left"><strong>Modified Date</strong></td><td align="left">:&nbsp;&nbsp;&nbsp;{modified_date}</td>
                                    </tr>
                                </td>
                                </tbody>
                            </table>
                            <a href='<?php echo base_url(); ?>admin/video'>Back</a>
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
