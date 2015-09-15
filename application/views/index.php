<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{meta_description}">
    <meta name="keywords" content="{meta_tag}"> 
	<meta name="author" content="{author}">
   	<meta property="og:title" content="{title}"/>
	<meta property="og:url" content="{url}"/>
	<meta property="og:image" content="{og_image}"/>
	
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:url" content="{url}">
	<meta name="twitter:title" content="{site_name} - {title}">
	<meta name="twitter:site" content="@kepoabiscom" />
	<meta name="twitter:site:id" content="@kepoabiscom" />
	<meta name="twitter:creator" content="@kepoabiscom" />
	<meta name="twitter:description" content="{meta_description}" />
	<meta name="twitter:image:src" content="{og_image}?w=650" />
    <meta property="twitter:domain" content="http://www.kepoabis.com" />
	<meta property="og:locale" content="id_ID" />
    <meta property="og:locale:alternate" content="id_ID" />
	  

    <link rel="icon" href="<?php echo base_url('favicon.png'); ?>">
    
    <title>{site_name} &trade; - {title}</title>

    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<style>
		body{
			background: url('<?php echo base_url('assets/img/background.jpg'); ?>') no-repeat center top; background-size: 380%; background-attachment: fixed;
		}
		
		#header{
			#background: #ddd;
		}
		
		#navigation ul li {
			font-weight: bold;
		}
		
		#navigation ul li.active{
			border-bottom: 3px solid #555;
		}
		
		#navigation ul ul li a {
			background-color: #ffffff;
		}
		
		/*
		#page-title {
			-moz-border-bottom-colors: none;
			-moz-border-left-colors: none;
			-moz-border-right-colors: none;
			-moz-border-top-colors: none;
			background: #009688 none repeat scroll 0px 0px; width: 1343px; float: left; display: block;
			border-color: #03db21 -moz-use-text-color;
			border-image: none;
			border-style: solid none;
			border-width: 1px medium;
			margin-top: -1px;
		}
		*/
		
		#page-title {
			border-bottom: 1px solid #f0f0f0;
			border-top: 1px solid #f0f0f0;
			/* margin-bottom: 10px; */
			width: 100%;
		}
		
		.breadcrumb{
			margin-top: 10px; 
		}
		
		.panel-group {
			margin-bottom: 5px;
		}
		
		@media (max-width: 767px) {
			body{
				background-color:rgba(255,255,255,0.5); background: none;
			}
			
			.header, #navigation {
				text-align: center;
			}
			
			#navigation ul li a {
				border-bottom: 3px solid transparent;
				color: #888;
				display: inline-block;
				font-family: Arial,sans-serif;
				font-size: 12px;
				padding: 10px 10px;
				text-decoration: none;
			}
		}
	</style>
	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.lazyload.js?v=1.9.1'); ?>"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script type="text/javascript" charset="utf-8">
		$(function() {
			$("img.lazy").lazyload({
				event : "sporty"
			});
		});

		$(window).bind("load", function() {
			var timeout = setTimeout(function() { $("img.lazy").trigger("sporty") }, 100);
		});   
		</script>
  </head>

  <body>
    <!-- Fixed navbar -->
    {header}
    {slider}
	<div style="background-color: rgba(255,255,255,0.9)">
		<div class="<?php echo (! $this->uri->segment(1) || $this->uri->segment(1) == 'home') ? 'container-fluid' : 'container'; ?>" style="min-height: 515px; padding-bottom: 20px;">

		  <div class="row">
			{content}
		  </div>

		</div> <!-- /container -->
	</div>
	<div style="background-color: #fff; border-top: 1px solid #ccc;">{map}</div>
	<div class="footer">{footer}</div>
	
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
		
		<?php if(ENVIRONMENT == 'production') { ?>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-48862041-1', 'auto');
		ga('send', 'pageview');
		<?php } ?>
	</script>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
