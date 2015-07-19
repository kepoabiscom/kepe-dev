<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Home Dahsboard - KepoAbis.com</title>

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
     <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var defaultYear = 2014;
        var baseUrl = "<?php echo base_url(); ?>";

        $.getJSON(baseUrl+"admin/dashboard/get_stat", {"year": defaultYear}, function(data) {
            var r = []; var t = []; var v = []; var x = [];
            var s = []; var u = []; var w = []; var y = [];
            var temp = [];
            for(i = 0; i < 4; i++) {
                if(i == 0) temp = data.Home; 
                if(i == 1) temp = data.Article;
                if(i == 2) temp = data.News;
                if(i == 3) temp = data.Videografi;
                var r = []; var s = [];
                for(j = 0; j < temp.length; j++) {
                    r[j] = temp[j].label;
                    s[j] = temp[j].y;
                }
                if(i == 0) {
                    t = r; u = s;
                }
                if(i == 1) {
                    v = r; w = s;
                }
                if(i == 2) {
                    x = r; y = s;
                }
                temp = [];
            }
            
             window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer",{
                  title:{
                    text: "Unique Visitors Statistics 2014 - KepoAbis.com"             
                  }, 
                  animationEnabled: true,     
                  axisY:{
                    titleFontFamily: "arial",
                    titleFontSize: 12,
                    includeZero: false
                  },
                  toolTip: {
                    shared: true
                  },
                  data: [{        
                    type: "spline",  
                    name: "Home Page",        
                    showInLegend: true,
                    dataPoints: [
                        {label: t[0], y: u[0]},     
                        {label: t[1], y: u[1]},     
                        {label: t[2], y: u[2]},     
                        {label: t[3], y: u[3]},     
                        {label: t[4], y: u[4]},     
                        {label: t[5], y: u[5]},     
                        {label: t[6], y: u[6]},     
                        {label: t[7], y: u[7]},
                        {label: t[8], y: u[8]},     
                        {label: t[9], y: u[9]},     
                        {label: t[10], y: u[10]},     
                        {label: t[11], y: u[11]}           
                    ]
                  },
                  {
                   type: "spline",  
                    name: "Article Page",        
                    showInLegend: true,
                    dataPoints: [
                        {label: v[0], y: w[0]},     
                        {label: v[1], y: w[1]},     
                        {label: v[2], y: w[2]},     
                        {label: v[3], y: w[3]},     
                        {label: v[4], y: w[4]},     
                        {label: v[5], y: w[5]},     
                        {label: v[6], y: w[6]},     
                        {label: v[7], y: w[7]},
                        {label: v[8], y: w[8]},     
                        {label: v[9], y: w[9]},     
                        {label: v[10], y: w[10]},     
                        {label: v[11], y: w[11]}
                    ]
                  },
                  {
                   type: "spline",  
                    name: "News Page",        
                    showInLegend: true,
                    dataPoints: [
                        {label: x[0], y: y[0]},     
                        {label: x[1], y: y[1]},     
                        {label: x[2], y: y[2]},     
                        {label: x[3], y: y[3]},     
                        {label: x[4], y: y[4]},     
                        {label: x[5], y: y[5]},     
                        {label: x[6], y: y[6]},     
                        {label: x[7], y: y[7]},
                        {label: x[8], y: y[8]},     
                        {label: x[9], y: y[9]},     
                        {label: x[10], y: y[10]},     
                        {label: x[11], y: y[11]}            
                    ]
                  },
                  {
                   type: "spline",  
                    name: "Videografi Page",        
                    showInLegend: true,
                    dataPoints: [
                        {label: r[0], y: s[0]},     
                        {label: r[1], y: s[1]},     
                        {label: r[2], y: s[2]},     
                        {label: r[3], y: s[3]},     
                        {label: r[4], y: s[4]},     
                        {label: r[5], y: s[5]},     
                        {label: r[6], y: s[6]},     
                        {label: r[7], y: s[7]},
                        {label: r[8], y: s[8]},     
                        {label: r[9], y: s[9]},     
                        {label: r[10], y: s[10]},     
                        {label: r[11], y: s[11]}             
                    ]
                  }
                  ],
                  legend:{
                    cursor:"pointer",
                    itemclick:function(e){
                      if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                      }
                      else {
                        e.dataSeries.visible = true;            
                      }
                      chart.render();
                    }
                  }
                });
                chart.render();
            }
        });

       
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>   

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php $this->load->view("admin/templates/header"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $active['menu'] = "home"; $this->load->view("admin/templates/sidebar", $active); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Home Dashboard
                            <small>KepoAbis.com</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>&nbsp;Home
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Welcome</strong> on <strong>Dashboard KepoAbis.com</strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{celcius}&deg;c</div>
                                    <div><strong>{weather}</strong><br>{city}</div>
                                </div>
                            </div>
                        </div>
                        <a>
                            <div class="panel-footer">
                                <span class="pull-left">{now}</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">2</div>
                                        <div>New Comments!<br>&nbsp;<br></div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class="form-group">
                    <div class="col-sm-2">
                        <label>Year</label>
                        <select class="form-control" id="year" name="year" onkeyup="">
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div id="chartContainer" style="height: 300px; width: 100%;">
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>
