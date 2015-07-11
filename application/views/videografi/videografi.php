<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">Videografi</li>
			{/get_breadcrumb}
		</ol>
	</div>
	<div style="padding: 5px;">
		<ol class="list-inline">
			<li <?php echo ($this->uri->segment(5) == '') ? "class='active'" : ""; ?>><a href='<?php echo base_url('videografi'); ?>' data-toggle='tooltip' data-placement='top' title='All'>All</a></li>
			{get_video_category}
				{list}
			{/get_video_category}
		</ol>                 	 
	</div>
</div>
<div class="col-md-12 blog-main">
	<div class="row">
		{get_video}
		<div class="col-md-6">
			<div class="recent_post">
				<div>
					<h2>{title}</h2>
					{image}
					<br>
					<p class="post-body">On {created_date} By {full_name}, {count_video_comment} Comment</p>
					<p>{description}</p>
					 <p>Tag {tag}</p>
				</div>
			</div>                	 
		</div>
		{/get_video}
		<div class="col-md-12">
			<div style="text-align: center;">
				{page}
			</div>
		</div>
	</div>
</div>
<!--
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
-->

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>