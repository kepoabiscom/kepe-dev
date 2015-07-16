<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">Videografi</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>

<div class="col-md-12">
	<div class="row">
		{get_video}
		<div class="col-md-4" style="margin-bottom: 20px;">
			<div class="recent_post">
				<div>
					<div class="title">{title}</div>
					<p class="post-body">
						On {created_date} By {full_name}
					</p>
					<p>{image}</p>
					<p>
						{count_video_comment} comment | {count_video_stat} views
					</p>
					<!--<p>{description}</p>-->
					 <p>Tag {tag}</p>
				</div>
			</div>                	 
		</div>
		{/get_video}
		<div class="clear"></div>
		<div class="col-md-3"></div>
		<div class="col-md-6 pull-center">
			<ol class="list-inline list-inline-btn">
				<li <?php echo ($this->uri->segment(5) == '') ? "class='active'" : ""; ?>><a href='<?php echo base_url('videografi'); ?>' data-toggle='tooltip' data-placement='top' title='All'>All</a></li>
				{get_video_category}
					{list}
				{/get_video_category}
			</ol>                 	 
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-12">
			<div style="text-align: center;">
				{page}
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>