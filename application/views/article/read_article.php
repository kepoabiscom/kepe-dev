<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Beranda</a></li>
			<li class="active">Article</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-8 blog-main">
	<div class="blog-post">
		<h2 class="blog-post-title">{title}</h2>
		<p class="blog-post-meta">{created_date} by : {nama_lengkap}</p>
			{image}
		{summary}
	</div><!-- /.blog-post -->
	
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

