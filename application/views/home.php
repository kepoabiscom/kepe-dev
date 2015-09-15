		<style>
			.kp-news a, .kp-article a{
				color: black;
			}
			
			.kp-news a:hover, .kp-article a:hover{
				color: blue;
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
		</style>
		<div class="col-md-3"  style="background: none repeat scroll 0 0; padding-top: 15px; padding-bottom: 15px;">
			<div class="sidebar-module" style="margin-bottom: 20px;">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
				  </ol>

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
				  <div class="carousel-inner" role="listbox">
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
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
			
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
				{get_video}
					{open_parenthesis}
					<div class="col-md-3">
						<p>{image}</p>
						<div  style="font-size: 20px;">{title}</div>
						<div class="post-body">
							<!--
							<i class="glyphicon glyphicon-comment"></i>&nbsp;{count_video_comment} comment | 
							<i class="glyphicon glyphicon-stats"></i>&nbsp;{count_video_stat} views | 
							<i class="glyphicon glyphicon-time"></i>&nbsp;{duration}
							-->
							On {created_date} 
							<br/>By {full_name}
						</div>
					</div>
					{closing_parenthesis}
				{/get_video}
			</div>
		</div>
			
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>
