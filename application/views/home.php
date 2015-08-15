
		<div class="col-md-3">
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
			

