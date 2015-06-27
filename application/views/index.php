<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KepoAbiscom - Always Make You Curious">
    <meta name="keywords" content="KepoAbiscom, Kepo, Abis">
    <meta name="author" content="Haamill Productions">
    <link rel="icon" href="<?php echo base_url('favicon.png'); ?>">

    <title>KepoAbis.com by Haamill Productions Team</title>

    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	
	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
  </head>

  <body>
    <!-- Fixed navbar -->
    <div>{header}</div>
    <div>{slider}</div>

    <div class="container" style="margin-bottom: 20px;">

      <div class="row">
		{content}
      </div>

    </div> <!-- /container -->
	
	<div>{footer}</div>
	
	<script>
		var myCenter=new google.maps.LatLng( -6.290491, 106.860785);

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
		  content:"<p><a href='#' style='font-size: 24px;'>KepoAbis.com</a> by Haamill Productions<br>Jalan Pelita RT 02/09 No. 69, Kelurahan Tengah, Kecamatan Kramat Jati, Jakarta Timur 13540<br>Indonesia<br>Phone: +62 856 973 09 204<br>Email: <a href='mailto:#'>hi@kepoabis.com</a></p>"
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
