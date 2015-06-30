<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Beranda</a></li>
			<li><a href="{videografi}">Videografi</a></li>
			<li class="active">{title}</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-8">
	<div class="blog-post">
		<h2 class="blog-post-title">{title}</h2>
		<p class="blog-post-meta">{created_date} by <a href="#">{full_name}</a></p>
		{video}
		<p>{description}</p>
		<p>Category : {title_category}</p>
		<nav class="text-center">
		  <ul class="pagination">
			<li>
			  <a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo; Previous</span>
			  </a>
			</li>
			<li>
			  <a href="#" aria-label="Next">
				<span aria-hidden="true">Next &raquo;</span>
			  </a>
			</li>
		  </ul>
		</nav>
	</div>
</div>
<div class="col-md-4">
	<div class="sidebar-module">
		<h4>Recent Videografi</h4>
		<ul class="recent_post">
			{get_video}
			<li>
				{image}
				<div>
					{title}
				</div>
				{created_date}
				<div class="clear"></div>
			</li>
			{/get_video}
		</ul>                	 
	</div>
</div>


