<div class="col-md-12">
	<div clas="row">
		<div class="col-md-3">
			<div class="sidebar-module">
				<h2 class="title">NEWS</h2>
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
				<h2 class="title">ARTICLE</h2>
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
				<h2 class="title">LOCATION ON MAP</h2>
				<div id="googleMap" style="width:100%;height:245px;">
				</div>
			</div>
		</div>
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