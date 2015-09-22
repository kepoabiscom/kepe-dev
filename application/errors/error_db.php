<html>
<head>
	<meta charset="utf-8">
	<?php if(ENVIRONMENT == 'production') { ?>
	<title>Maintenance</title>
	<?php } else { ?>
	<title>Database Error</title>
	<?php } ?>
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
				<h1>Server is busy, we'll be back shortly!</h1><br>
				<div class="clock" style="margin-left:30%;"></div>
				<script type="text/javascript">
					var clock;
					var sec = "<?php echo '120'; ?>";
					$(document).ready(function() {
						var clock;
						clock = $('.clock').FlipClock(sec, {
					        clockFace: 'MinuteCounter',
					        autoStart: false,
					        callbacks: {
					        	stop: function() {
					        		$(location).attr('href', location.href);
					        	}
					        }
					    });
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
						<a title="Twitter" target='_blank' href="https://twitter.com/kepoabiscom"><img class="icon_find_us1" width="96px" src="<?php echo base_url() . 'assets/img/twitter-icon.png' ;?>"></a>
						<a title="Facebook" target='_blank' href="https://www.facebook.com/kepoabiscom"><img class="icon_find_us1" width="96px" src="<?php echo base_url() . 'assets/img/facebook-icon.png'; ?>"></a>
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