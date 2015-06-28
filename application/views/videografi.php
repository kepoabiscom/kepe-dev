<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_menu}
			<li><a href="{home}">Beranda</a></li>
			<li class="active">Videografi</li>
			{/get_menu}
		</ol>
	</div>
</div>
<div class="col-md-8 blog-main">
	<div class="row">
		{get_video}
		<div class="col-md-6">
			<div class="recent_post">
				<div>
					{title}
					{image}
					<p>
						{description}
					</p>
				</div>
			</div>                	 
		</div>
		{/get_video}
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
</div>
<div class="col-md-4">
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

