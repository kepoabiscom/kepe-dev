		<div class="col-md-3">
			<div class="sidebar-module">
				<form role="search" method="get" action="<?php echo base_url('search'); ?>">
				<?php $s = explode("&", $_SERVER['QUERY_STRING']); ?>
				<div style="width: 225px;" class="input-group">
					<?php $q = explode("=", $s[0]); $q = isset($q[1]) ? $q[1] : ""; ?>
					<input type="text" placeholder="Search article / news / video" class="form-control" value="<?php echo strtolower(preg_replace('/\+/', ' ', $q)); ?>" name="q">
					<?php $t = "article"; if($q != "") { $t = explode("=", $s[1]); $t = $t[1]; } ?>
					<input type="hidden" value="<?php echo $t; ?>" name="type">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
				</form>
			</div>
			<div class="sidebar-module">
				<h2 class="line-title"><strong class="bold-text">Recent News</strong></h2>
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
			<div class="sidebar-module">
				<h2 class="line-title"><strong class="bold-text">Recent Articles</strong></h2>
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
			

