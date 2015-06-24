<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KepoAbiscom - Always Make You Curious">
    <meta name="keywords" content="KepoAbiscom, Kepo, Abis">
    <meta name="author" content="Haamill Productions">
    <link rel="icon" href="favicon.png">

    <title>KepoAbis.com by Haamill Productions Team</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="css/blog.css">
	<link rel="stylesheet" href="css/base.css">
  </head>

  <body>
    <!-- Fixed navbar -->
    <?php include('navigation.php'); ?>

    <div class="container" style="margin-bottom: 20px;">

		<div class="row">
			<div class="col-md-12">
				<div>
					<ol class="breadcrumb">
					  <li><a href="index.php">Beranda</a></li>
					  <li class="active">Portfolio</li>
					</ol>
				</div>
			</div>
			<div class="col-md-8 blog-main">
			<div class="row">
				<?php for($i=0; $i<6; $i++){ ?>
				<div class="col-md-6">
					<div class="recent_post">
							<div>
								<h5><a href="1914-translation-by-h-rackham.php">1914 translation by H. Rackham</a></h5>
								<img class="img-responsive" alt="Responsive image" src="img/video/default.png"/>
								<!--
								<div>
									<iframe width="100%" height="220" frameborder="0" allowfullscreen="" src="//www.youtube.com/embed/4pBuFf9ssFM?rel=0">
									</iframe>
								</div>
								-->
								<br>
								<p>
									description : <br>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat aliquet lobortis. Vestibulum non lectus vel metus sagittis vestibulum non in augue. In tincidunt pretium risus sit amet fringilla. 
								</p>
							</div>
					</div>                	 
				</div>
				<?php } ?>
				<div style="text-align: center;">
					<nav>
					  <ul class="pagination pagination-sm">
						<li><a href="#"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
					  </ul>
					</nav>
				</div>
			</div>
			</div>
			<div class="col-md-4">
				 <div class="sidebar-module">
						<h4>Recent Video</h4>
						<ul class="recent_post">
							<?php for($i=0; $i<3; $i++){ ?>
							<li>
								<a href="#"><img width="70px" align="left" src="img/video/default.png" alt="" style="margin-right: 10px;"></a>
								<div>
									<a href="1914-translation-by-h-rackham.php">1914 translation by H. Rackham</a>
								</div>
								1th January, 2014
								<div class="clear"></div>
							</li>
							<?php } ?>
					</ul>                	 
				</div>
				<div class="sidebar-module">
					<h4>Recent Category</h4>
					<ol class="list-unstyled">
						<li><a href="#">DOCUMENTER</a></li>
						<li><a href="#">COMMERCIAL</a></li>
						<li><a href="#">EDUCATION</a></li>
						<li><a href="#">ENTERTAINMENT</a></li>
						<li><a href="#">EXPERIMENTAL</a></li>
						<li><a href="#">PROMOTION</a></li>
						<li><a href="#">PUBLIC SERVICE</a></li>
						<li><a href="#">OPINI PUBLIC</a></li>
						<li><a href="#">SERBA-SERBI</a></li>
						<li><a href="#">TRAVELLING</a></li>
						<li><a href="#">VLOG</a></li>
					</ol>                 	 
				</div>
			</div>
        </div>
    </div>

    </div> <!-- /container -->
	
	<?php include('footer.php'); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
