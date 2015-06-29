<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Beranda</a></li>
			<li class="active">Berita</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-8 blog-main">
	<div class="row">
		<div class="col-md-6">
			<div class="recent_post">
				<div>
					<h3>{title}</h3>
					{image}
					<p>Created Date {created_date}</p>
					<p>By: {nama_lengkap}</p>
					<p>
						{summary}
					</p>
				</div>
			</div>                	 
		</div>
		
	</div>
</div>
<div class="col-md-4">
	<div class="sidebar-module">
		<h5 style="font-weight: 400; font-size: 24px;">Category</h5>
		<ol class="list-unstyled">
			{get_news_category}
				{list}
			{/get_news_category}
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

