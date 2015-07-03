<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">News</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-8 blog-main">
	{get_news}
	<div class="blog-post">
		<h2 class="blog-post-title">{title}</h2>
		<p class="blog-post-meta">{created_date} by {full_name}</p>
			{image}
		{body}
	</div><!-- /.blog-post -->
	{/get_news}
	<div class="col-md-12">
		<div style="text-align: center;">
			{page}
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="sidebar-module">
		<h2>Category</h2>
		<ol class="list-unstyled">
			{get_news_category}
				{list}
			{/get_news_category}
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
