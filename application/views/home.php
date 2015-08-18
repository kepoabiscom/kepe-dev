		<style>
			.kp-news a, .kp-article a{
				color: #fff;
			}
			
			.kp-news a:hover, .kp-article a:hover{
				color: #ddd;
				text-decoration: none;
			}
			
			.carousel-control.left, .carousel-control.right {
				background-image: none;
				background-repeat: repeat-x;
			}
		</style>
		<div class="col-md-3"  style="background: #009688 none repeat scroll 0 0; padding-top: 15px; padding-bottom: 15px;">
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

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					{get_all}
					<div class="{status}">
						<div style="padding-bottom: 10px; color: #ffffff; background-color: #009688;">
							<span style="font-size: 16px;"><b>{title}</b></span>
						</div>
						<img src="{path_image}" alt="Chania">
						<div style="padding: 5px 0; min-height: 30px; color: #ffffff; background-color: #009688;">
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
			<div class="sidebar-module">
				<form role="search" method="get" action="<?php echo base_url('search'); ?>">
				<?php $s = explode("&", $_SERVER['QUERY_STRING']); ?>
				<div class="input-group">
					<?php $q = explode("=", $s[0]); $q = isset($q[1]) ? $q[1] : ""; ?>
					<input type="text" placeholder="search article / news / video" class="form-control" value="<?php echo strtolower(preg_replace('/\+/', ' ', $q)); ?>" name="q">
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
			<div class="sidebar-module kp-news">
				<h2 class="line-title"><strong class="bold-text" style="color: #FFFF00;">Recent News</strong></h2>
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
				<h2 class="line-title"><strong class="bold-text" style="color: #FFFF00;">Recent Articles</strong></h2>
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
		<div class="col-md-9" style="padding-top: 10px;">
			<div class="row">
				{get_video}
					{open_parenthesis}
					<div class="col-md-4">
						<div  style="font-size: 18px;">{title}</div>
						<p  style="font-size: 12px;" class="post-body">
							On {created_date} By {full_name}
						</p>
						<p>{image}</p>
					</div>
					{closing_parenthesis}
				{/get_video}
			</div>
		</div>
			

