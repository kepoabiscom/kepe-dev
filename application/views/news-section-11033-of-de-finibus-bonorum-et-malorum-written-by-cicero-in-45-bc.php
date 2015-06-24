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
					  <li><a href="berita.php">Berita</a></li>
					  <li class="active">Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</li>
					</ol>
				</div>
			</div>
			<div class="col-md-8 blog-main">
			  <div class="blog-post">
				<h2 class="blog-post-title">Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h2>
				<p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

				<p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
				<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				<ul>
				  <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
				  <li>Donec id elit non mi porta gravida at eget metus.</li>
				  <li>Nulla vitae elit libero, a pharetra augue.</li>
				</ul>
				<p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
				<ol>
				  <li>Vestibulum id ligula porta felis euismod semper.</li>
				  <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
				  <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
				</ol>
				<p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
			  </div><!-- /.blog-post -->
				<!--
			  <nav>
				<ul class="pager">
				  <li><a href="#">Previous</a></li>
				  <li><a href="#">Next</a></li>
				</ul>
			  </nav>
			  -->
			  <p class="text-center">
				<a href="#" class="selengkapnya">Berita Sebelumnya</a>&nbsp; &nbsp; &nbsp; &nbsp;
				<a href="#" class="selengkapnya">Berita Selanjutnya</a>
			</p>
			</div>
			<div class="col-md-4">
			  <div class="sidebar-module">
					<h4>Recent News</h4>
					<ul class="recent_post">
						<?php for($i=0; $i<3; $i++){ ?>
						<li>
							<a href="#"><img width="70px" align="left" src="img/article/default.png" alt="" style="margin-right: 10px;"></a>
							<div>
								<a href="news-section-11033-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc.php">Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</a>
							</div>
							1th January, 2014
							<div class="clear"></div>
						</li>
						<?php } ?>
					</ul>                   	 
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
