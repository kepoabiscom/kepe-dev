<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KepoAbiscom - Always Make You Curious">
    <meta name="keywords" content="{meta_tag}"> 
   	<meta property="og:title" content="{title}"/>
	<meta property="og:url" content="{url}"/>
	<meta property="og:image" content="{og_image}"/>
    <link rel="icon" href="<?php echo base_url('favicon.png'); ?>">
    

    <title>{site_name} &trade;</title>

    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<style>
		body{
			background-color:rgba(17,183,152,0.5); background: url('<?php echo base_url('assets/img/background.jpg'); ?>') no-repeat center top; background-size: 150%; background-attachment: fixed;
		}
		
		@media (max-width: 415px) {
			body{
				background-color:rgba(255,255,255,0.5); background: none;
			}
		}
		
		#nav li:hover a, #nav li.current:hover a, #nav li.current a {
			background: rgb(135, 0, 0) none repeat scroll 0px 0px;
			color: #fff;
		}		
		
		#navigation ul li:hover a, #navigation ul ul li:hover a, #navigation ul li a:hover {
			color: #fff;
		}
		
		#navigation ul ul li a {
			border-bottom: 1px solid rgb(255, 255, 255);
			margin: 0px 0px;
			padding: 8px 16px;
			width: 160px;
		}
		
		#navigation ul ul {
			margin: 0 0 0 -1px;
			background: #fff none repeat scroll 0 0;
			border-color: rgb(135, 0, 0);
			border-image: none;
			border-style: solid;
			border-radius: 0px
		}

		#navigation ul ul li a:hover {
			border-color: rgb(255, 255, 255);
			background: rgb(255, 255, 255) none repeat scroll 0px 0px;
			color: #777;
		}
	</style>
	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
  </head>

  <body>
    <!-- Fixed navbar -->
    {header}
    {slider}
	<div style="background-color: rgba(255,255,255,0.9)">
		<div class="container" style="padding-top: 10px; padding-bottom: 10px; min-height: 515px;">

		  <div class="row">
			{content}
		  </div>

		</div> <!-- /container -->
	</div>
	<div style="background-color: #fff; border-top: 1px solid #ccc;">{map}</div>
	{footer}
	<!-- Back To Top Button -->
	<div id="backtotop"><a href="#"></a></div>
	
	<script>
		var myCenter=new google.maps.LatLng("{contact_lat}", "{contact_long}");

		function initialize()
		{
		var mapProp = {
			center:myCenter,
			zoom:15,
			scrollwheel: false,
			panControl: true,
			zoomControl: true,
			scaleControl: true,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		  };

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker=new google.maps.Marker({
		  position:myCenter,
		  });

		marker.setMap(map);

		var infowindow = new google.maps.InfoWindow({
		  content:"{contact_footer}"
		  });

		google.maps.event.addListener(marker, 'click', function() {
		  infowindow.open(map,marker);
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
