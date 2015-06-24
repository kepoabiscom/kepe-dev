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

	<link rel="stylesheet" href="css/base.css">
	
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		var myCenter=new google.maps.LatLng( -6.290491, 106.860785);

		function initialize()
		{
		var mapProp = {
		  center:myCenter,
		  zoom:15,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		  };

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker=new google.maps.Marker({
		  position:myCenter,
		  });

		marker.setMap(map);

		var infowindow = new google.maps.InfoWindow({
		  content:"<p><a href='#' style='font-size: 24px;'>KepoAbis.com</a> by Haamill Productions<br>Jalan Pelita RT 02/09 No. 69, Kelurahan Tengah, Kecamatan Kramat Jati, Jakarta Timur 13540<br>Indonesia<br>Phone: +62 856 973 09 204<br>Email: <a href='mailto:#'>hi@kepoabis.com</a></p>"
		  });

		google.maps.event.addListener(marker, 'click', function() {
		  infowindow.open(map,marker);
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
  </head>

  <body>
    <!-- Fixed navbar -->
    <?php include('navigation.php'); ?>

    <div class="container" style="margin-bottom: 20px;">

      <div class="row">
		<div class="col-md-12">
			<div>
				<ol class="breadcrumb">
				  <li class="active">Beranda</li>
				</ol>
			</div>
		</div>
        <div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div style="font-size: 24px; margin-bottom: 10px;">Recent News</div>
					<?php for($i=0; $i<2; $i++){ ?>
					<div class="news">
						<h5><a href="news-section-11033-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc.php">Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</a></h5>
						<p><em>08 Nov 2012 13:43:03 </em></p>		
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</p>
						<div style="text-align: right; margin: 20px 10px 10px 10px;">
							<a href="news-section-11033-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc.php">Selengkapnya</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
        <div class="col-md-4">
          <div class="row">
			<div class="col-md-12">
				<div class="sidebar-module">
					<div style="font-size: 24px; margin-bottom: 10px;">Recent Article</div>
						<ul class="recent_post">
						<?php for($i=0; $i<3; $i++){ ?>
						<li>
							<a href="#"><img width="70px" align="left" src="img/article/default.png" alt="" style="margin-right: 10px;"></a>
							<div>
								<a href="article-section-11033-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc.php">Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</a>
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
		<div class="col-md-12">
          <div class="row">
			<div class="col-md-12">
				<div style="font-size: 24px; margin-bottom: 10px;">Recent Video</div>
			</div>
			<?php for($i=0; $i<3; $i++){ ?>
			<div class="col-md-4">
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
          </div>
        </div>
		<div class="col-md-12">
				<div style="font-size: 24px; margin-bottom: 10px;">Google Map</div>
				<div style="padding: 5px; background-color: #ddd;">
					<div id="googleMap" style="width:100%;height:305px; border: 1px solid #fff;"></div>
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
