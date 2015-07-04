<!-- appId=876274572459160 appId for KepoAbis.com -->
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=876274572459160";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li><a href="{article}">Article</a></li>
			<li class="active">{title}</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-8">
	<div class="blog-post">
		<div class="fb-share-button" data-href="{url}" data-layout="button_count"></div>
		<h2 class="blog-post-title">{title}</h2>
		<p class="blog-post-meta">{created_date} by <a href="#">{full_name}</a></p>
		{image}
		<p>{summary}</p>
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
		<h2>Category</h2>
		<ol class="list-unstyled">
			{get_article_category}
				{list}
			{/get_article_category}
		</ol>                 	 
	</div>
	<div class="sidebar-module">
		<h2>Archives</h2>
            <ol class="list-unstyled">
				{get_archives_list}
					{list}
				{/get_archives_list}
            </ol>
    </div>
</div>
</div>

