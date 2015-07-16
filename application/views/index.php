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
	
	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
  </head>

  <body>
    <!-- Fixed navbar -->
    {header}
    {slider}

    <div class="container" style="margin-top: 10px; margin-bottom: 10px;">

      <div class="row">
		{content}
      </div>

    </div> <!-- /container -->
	{map}
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
