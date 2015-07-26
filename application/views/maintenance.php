<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to KepoAbis.com</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php echo base_url(). 'assets/css/flipclock.css'; ?>">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script src="<?php echo base_url(). 'assets/js/flipclock.js'; ?>"></script>
	<link rel="shortcut icon" href="<?php echo base_url(). 'assets/img/favicon.png'; ?>">
	<link href="<?php echo base_url() . 'assets/css/default.css'; ?>" rel="stylesheet" media="screen">
</head>
<body>
	<div class="page-wrap">
		<div style="padding: 50px;">
			<div class="header">
				<h1><em>KepoAbis.com</em> will be launched around</h1>
				<div class="clock" style="margin:2em;"></div>
				<div class="message"></div>

				<script type="text/javascript">
					var clock;
					$(document).ready(function() {
						var clock;
						clock = $('.clock').FlipClock({
					        clockFace: 'DailyCounter',
					        autoStart: false,
					        callbacks: {
					        	stop: function() {
					        		$('.message').html('<h1>KepoAbis.com Launched!</h1>')
					        	}
					        }
					    });
					    var sec = "<?php echo $seconds; ?>";
					    clock.setTime(sec);
					    clock.setCountdown(true);
					    clock.start();
					});
				</script>
			</div>
			<div class="content">
				<div class="left-content">
					<div class="image-box-wrapper" id="image-box-wrapper">
						<div style="clear:both;"></div>
					</div>
				</div>
				<div class="right-content">
					<p class="quote">
						"Always make you curious!"
					<p>
					<p>
						<!--<a title="Blog" href="#"><img class="icon_find_us1" width="96px" src="<?php echo base_url() . 'assets/img/wordpress-icon.png'; ?>"></a>-->
						<a title="Twitter" href="https://twitter.com/kepoabiscom"><img class="icon_find_us1" width="96px" src="<?php echo base_url() . 'assets/img/twitter-icon.png' ;?>"></a>
						<a title="Facebook" href="https://www.facebook.com/kepoabiscom"><img class="icon_find_us1" width="96px" src="<?php echo base_url() . 'assets/img/facebook-icon.png'; ?>"></a>
					</p>
					<br>
					<p>
                        <br>Email: hi@kepoabis.com 
					<p>	
				</div>
			</div>
		</div>
		<div class="footer">
			<p>
				Copyright &copy; 2015 Haamill Productions. All Rights Reserved. 
			</p>
		</div>
	</div>
</body>
</html>