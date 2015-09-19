<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">About</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
{get_content_static}
		<div class="col-md-3" style="margin-bottom: 20px;">
			<div class="recent_post">
				<div>
					<div class="title" style="margin-bottom: 5px;">{sub_title}</div>	
					<p>{summary}</p>
					<p class="post-body">
						By {full_name}
					</p>
					{read_more}
				</div>
			</div>                	 
		</div>
{/get_content_static}

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>