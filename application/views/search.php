<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">Search</li>
			{/get_breadcrumb}
		</ol>
	</div>
	<div>
	<form role="search" method="get" action="<?php echo base_url('search'); ?>">
		<?php $s = explode("&", $_SERVER['QUERY_STRING']); ?>
		<div class="input-group">
			<?php $q = explode("=", $s[0]); $q = isset($q[1]) ? $q[1] : ""; ?>
			<input type="text" placeholder="Search article / news / video" class="form-control" value="<?php echo strtolower(preg_replace('/\+/', ' ', $q)); ?>" name="q">
			<?php $t = "video"; if($q != "") { $t = explode("=", $s[1]); $t = $t[1]; } ?>
			<input type="hidden" value="<?php echo $t; ?>" name="type">
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		</div>
	</form>
	</div>
	<div class="btn-group" role="group" aria-label="...">
		{tab_search}
			{tab}
		{/tab_search}
	</div>
</div>
<div class="col-md-12">
	<div><h4>Keyword : '{q}' result ({elapsed_time}) s</h4></div>
</div>
<div class="col-md-8 blog-main">
	{get_search}
	<div class="blog-post">
		<h2 class="blog-post-title"><a href="{url}">{title}</a></h2>
		<p class="blog-post-meta">
			{summary}
			{no_result}
		</p>
	</div>
	{/get_search}
	<div class="col-md-12">
		<div style="text-align: center;">
			{paging}
		</div>
	</div>
</div>
<!--hai!-->