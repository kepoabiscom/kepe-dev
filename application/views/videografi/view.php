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
<script>!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
	if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
		js.src=p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);}
	}(document, 'script', 'twitter-wjs');
</script>

<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li><a href="{videografi}">Videografi</a></li>
			<li class="active">{title}</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-8">
	<div class="blog-post">
		<div class="fb-share-button" data-href="{url}" data-layout="button_count"></div>
		<a href="https://twitter.com/share" class="twitter-share-button" data-text="{title}" data-via="kepoabiscom" data-hashtags="KepoAbis">Tweet</a>
		<h2 class="blog-post-title">{title}</h2>
		<p class="blog-post-meta">{created_date} by <a href="#">{full_name}</a></p>
		{url}
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
		<h2 class="blog-post-title">Recent Videografi</h2>
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
	<div class="sidebar-module">
		<h5 style="font-weight: 400; font-size: 24px;">Category</h5>
		<ol class="list-unstyled">
			{get_video_category}
				{list}
			{/get_video_category}
		</ol>                 	 
	</div>
	<div class="sidebar-module">
		<h5 style="font-weight: 400; font-size: 24px;">Archives</h5>
            <ol class="list-unstyled">
				{get_archives_list}
					{list}
				{/get_archives_list}
            </ol>
    </div>
</div>


