<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">Article</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-8 blog-main">
	<div class="row">
		{get_article}
		<div class="col-md-6">
			<div class="recent_post">
				<div>
					{title}
					{image}
					<p>
						{summary}
					</p>
				</div>
			</div>                	 
		</div>
		{/get_article}
		<div class="col-md-12">
			<div style="text-align: center;">
				{page}
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="sidebar-module">
		<h5 style="font-weight: 400; font-size: 24px;">Category</h5>
		<ol class="list-unstyled">
			{get_article_category}
				{list}
			{/get_article_category}
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

