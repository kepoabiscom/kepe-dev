		<style>
			.kp-news a, .kp-article a{
				color: #505050 ;
				font-family: "Arial", Times, serif;
				font-size: 110%;
			}
			
			.kp-news a:hover, .kp-article a:hover{
				color: green;
				text-decoration: none;
			}
			
			.carousel-control.left, .carousel-control.right {
				background-image: none;
				background-repeat: repeat-x;
			}
	
			box-img {
				position: relative;
				display: inline-block;
				border: 1px solid green;
			}
			
			#box-img * {
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
			}
			
			#image {
				z-index: 9;
				text-align: center;
				border: 1px solid blue;
			}
			
			#play {
				background: url('http://kepoabis.com/assets/img/play-btn.png') center center no-repeat;
				margin: -155px 10px 0 0;
				height: 160px;
				position: relative;
				z-index: 10;
			}

			.video-list-thumbs{}
			.video-list-thumbs > li{
			    margin-bottom:12px;
			}
			.video-list-thumbs > li:last-child{}
			.video-list-thumbs > li > a{
				display:block;
				position:relative;
				background-color: white;
				color: black;
				padding: 8px;
				border-radius:3px
			    transition:all 500ms ease-in-out;
			    border-radius:4px
			}
			.video-list-thumbs > li > a:hover{
				box-shadow:0 2px 5px rgba(0,0,0,.3);
				text-decoration:none
			}
			.video-list-thumbs h2{
				bottom: 0;
				font-size: 14px;
				height: 33px;
				margin: 8px 0 0;
			}
			.video-list-thumbs .glyphicon-play-circle{
			    font-size: 60px;
			    opacity: 0.6;
			    position: absolute;
			    right: 39%;
			    top: 15%;
			    text-shadow: 0 1px 3px rgba(0,0,0,.5);
			    transition:all 500ms ease-in-out;
			}
			.video-list-thumbs > li > a:hover .glyphicon-play-circle{
				color:#fff;
				opacity:1;
				text-shadow:0 1px 3px rgba(0,0,0,.8);
			}
			.video-list-thumbs .duration{
				background-color: rgba(0, 0, 0, 0.4);
				border-radius: 2px;
				color: #fff;
				font-size: 11px;
				font-weight: bold;
				left: 12px;
				line-height: 13px;
				padding: 2px 3px 1px;
				position: absolute;
				top: 12px;
			    transition:all 500ms ease;
			}
			.video-list-thumbs > li > a:hover .duration{
				background-color:#000;
			}
			@media (min-width:320px) and (max-width: 480px) { 
				.video-list-thumbs .glyphicon-play-circle{
			    font-size: 35px;
			    right: 36%;
			    top: 27%;
				}
				.video-list-thumbs h2{
					bottom: 0;
					font-size: 12px;
					height: 22px;
					margin: 8px 0 0;
				}
			}
		</style>
		<div class="col-md-3"  style="background: none repeat scroll 0 0; padding-top: 15px; padding-bottom: 15px;">
			<div class="sidebar-module" style="margin-bottom: 20px;">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <!--
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
				  </ol>
				  -->

				 <div class="sidebar-module">
					<form role="search" method="get" action="<?php echo base_url('search'); ?>">
					<?php $s = explode("&", $_SERVER['QUERY_STRING']); ?>
					<div class="input-group">
						<?php $q = explode("=", $s[0]); $q = isset($q[1]) ? $q[1] : ""; ?>
						<input type="text" placeholder="Search article / news / video" class="form-control" value="<?php echo strtolower(preg_replace('/\+/', ' ', $q)); ?>" name="q">
						<?php $t = "video"; if($q != "") { $t = explode("=", $s[1]); $t = $t[1]; } ?>
						<input type="hidden" value="<?php echo $t; ?>" name="type">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
					</form>
				</div>
				  <!-- Wrapper for slides -->
				  <div class="sidebar-module">
				  	<!--
					{get_all}
					<div class="{status}">
						<div style="background-color: #fff; padding-bottom: 10px; color: black;">
							<span style="font-size: 16px;"><b>{title}</b></span>
						</div>
						<img src="{path_image}" alt="Chania">
						<div style="padding: 5px 0; min-height: 30px; color: black;">
							<span>On {created_date_style} | {type}</span>
							<br><span>By {nama_lengkap}</span>
						</div>
					</div>
					{/get_all}
					-->
				  </div>

				  <!-- Left and right controls -->
				  <!--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>-->
				</div>
			</div>
			<!--
			<div class="sidebar-module kp-news">
				<h2 class="line-title"><strong class="bold-text" style="color: black;">Upcoming Events</strong></h2>
				<ol class="list-unstyled">
					<hr>
					{get_upcoming_events}
					<li>
						<a data-toggle='tooltip' data-placement='top' title='{title}' href="<?php echo base_url(); ?>{url}" target="_blank">{title}</a>
						<hr>
					</li>
					{/get_upcoming_events}
				</ol>
			</div>-->
			<div class="sidebar-module kp-news">
				<h2 class="line-title"><strong class="bold-text" style="color: black;">Recent News</strong></h2>
				<ol class="list-unstyled">
					<hr>
					{get_news}
						<li>
							<!-- <span class="glyphicon glyphicon-pushpin"></span> -->
							{title}
							<hr>
						</li>
					{/get_news}
				</ol>
			</div>
			<div class="sidebar-module kp-article">
				<h2 class="line-title"><strong class="bold-text" style="color: black;">Recent Articles</strong></h2>
				<ol class="list-unstyled">
					<hr>
					{get_article}
						<li>
							<!--<span class="glyphicon glyphicon-pushpin"></span>-->
							{title}
							<hr>
						</li>
					{/get_article}
				</ol>				
			</div>
			<div class="sidebar-module">
				<div>
					<a class="twitter-timeline" href="https://twitter.com/KepoAbisCom"  data-widget-id="459590213916848128">Tweets by @KepoAbisCom</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
			<!--
			<div class="sidebar-module">
				<h2 class="line-title"><strong class="bold-text">Location On Map</strong></h2>
				<div>
					<div id="googleMap" style="width:100%;height:245px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
					</div>
				</div>
			</div>
			-->
		</div>
		<div class="col-md-9">
			<div class="row">
				<h2 class="line-title"><strong class="bold-text" style="color: black; margin-left: 15px;">Recent Video</strong></h2>
				{get_video}
					{open_parenthesis}
						<li class="col-lg-3 col-sm-4 col-xs-6">
							<a href="{url}" title="{title}" target="_blank">
								<img src="{image}" alt="{title}" class="img-responsive" height="130px" />
								<h2 style="color:#009999">{title}</h2>
								<span class="glyphicon glyphicon-play-circle"></span>
								<span class="duration">{duration}</span><br>
								<div class="post-body">
									<p>By {full_name}</p>
									On {created_date}
								</div>
							</a>
						</li>
					{closing_parenthesis}
				{/get_video}
			</div>
		</div>
			
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>
