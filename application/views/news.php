<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_menu}
			<li><a href="{home}">Beranda</a></li>
			<li class="active">Berita</li>
			{/get_menu}
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
	<div style="text-align: center;">
		<nav>
			<ul class="pagination pagination-sm">
				<li><a href="#"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
			</ul>
		</nav>
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

