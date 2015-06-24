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
					  <li><a href="index.php">Beranda</a></li>
					  <li class="active">Kontak</li>
					</ol>
				</div>
			</div>
                    	<div class="col-md-4">
                        	<h2 class="title">Contact Info</h2>
                            <div style="padding: 5px; background-color: #ddd;">
								<div id="googleMap" style="width:100%;height:310px; border: 1px solid #fff;"></div>
							</div>
							<br>
							<a href="#">KepoAbis.com</a> &copy; 2013-2015<br>
							Haamill Productions<br>
							Jalan Pelita RT 02/09 No. 69, Kelurahan Tengah, Kecamatan Kramat Jati, Jakarta Timur 13540<br>Indonesia<br>
							<p>Phone: +62 856 973 09 204<br>Email: <a href="mailto:#">hi@kepoabis.com</a></p>                         
                        </div>
                    	<div class="col-md-8">
                        	<h2 class="title">Get In Touch</h2>
							<form class="bs-example bs-example-form" role="form">
							<div class="input-group">
							  <span class="input-group-addon">+</span>
							  <input type="text" class="form-control" placeholder="Name" value="" name="name">
							</div>
							<br>
							<div class="input-group">
							  <span class="input-group-addon">+</span>
							 <input type="text" class="form-control"  placeholder="Email" value="" name="email" >
							</div>
							<br>
							<div class="input-group">
							  <span class="input-group-addon">+</span>
							 <input type="text" class="form-control"  placeholder="Subject" value="" name="subject" >
							</div>
							<br>
							<div class="input-group">
							  <span class="input-group-addon">+</span>
								<textarea class="form-control" placeholder="Message" id="message" name="message"></textarea>
							</div>
							<br>
							<div class="clear"></div>
                                        <input type="reset" value="Clear form" class="btn btn-sm btn-primary">
                                        <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                                        <div class="clear"></div>
						  </form>
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