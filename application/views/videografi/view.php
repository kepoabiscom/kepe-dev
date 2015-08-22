<div id="fb-root"></div>
<style>
.crop {
    max-height: 60px;
    overflow: hidden;
    text-align: center;
    vertical-align: middle;
	float: left;
}

.crop img {
    transition: all 1.4s ease-in-out 0s;
}
</style>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=876274572459160";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script>!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
	if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
		js.src=p+'://platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js,fjs);}
	}(document, 'script', 'twitter-wjs');
</script>

<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li><a href="{videografi}">Videografi</a></li>
			<li class="active">{title}</li>
			{/get_breadcrumb}
		</ol>
	</div>
	<div class="fb-like" data-href="{url}" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
	<a href="https://twitter.com/share" class="twitter-share-button" data-text="{title}" data-via="kepoabiscom" data-hashtags="KepoAbis">Tweet</a>
</div>
<div class="col-md-8">
	<div class="blog-post">
		<h2 class="blog-post-title">{title}</h2>
		<p class="blog-post-meta">{created_date} by <a href="#">{full_name}</a></p>
		{video_embed}
		<p>
			<i class="glyphicon glyphicon-comment"></i>&nbsp;{count_video_comment} comment | 
			<i class="glyphicon glyphicon-stats"></i>&nbsp;{count_video_stat} views | 
			<i class="glyphicon glyphicon-time"></i>&nbsp;{duration}
		</p>
		<p>
		<script src="https://apis.google.com/js/platform.js"></script>
		<div class="g-ytsubscribe" data-channelid="UCjCQDSEsDTqq7wmth70khLQ" data-layout="default" data-count="default"></div>
		</p>
		<p>{description}</p>
		<p>In {title_category}</p>
	</div>
	<nav class="text-center">
		<ul class="pagination">
			{prev_next}
		</ul>
	</nav>
	<hr>
	<h2>Comments:</h2>
	<div class="comment-block">
		{get_comment}
	</div>
	<p><h2>You will comment?</h2></p>
	<div class ="msg"></div><br>
    <form id='form-comment' action="<?php echo base_url(). 'comment/ajax_'; ?>" method="post">
        <input type="hidden" class="form-control" value="<?php echo $video_id; ?>" name="video_id">
        <input type="hidden" class="form-control" value="published" name="status">
        <input type="hidden" class="form-control" value="video" name="type">
        <div class="form-group">
            <label for="name">Name* :</label>
            <input type="text" class="form-control" name="nick_name" placeholder="Your Name">
        </div>
        <div class="form-group">
            <label for="comment">Comment* :</label>
            <textarea type="text" class="form-control" name="body" placeholder="Your Comment"></textarea>
        </div>
        <!--
        <div class="form-group">
            <label for="n1"><h3>{n1}</h3></label>&nbsp;<label for="op"><h3>{op}</h3></label>&nbsp;<label for="n2"><h3>{n2}</h3></label>
            <input type="text" class="form-control" name="answer" placeholder="Your Abswer?">
        	<input type="hidden" class="form-control" value="{n1}" name="n1">
        	<input type="hidden" class="form-control" value="{op}" name="op">
        	<input type="hidden" class="form-control" value="{n2}" name="n2">
        </div>
		-->
        <input type="submit" id='submit' value='Submit' class="btn btn-success">
    </form>
</div>
<div class="col-md-4">
	<div class="sidebar-module">
		<h2 class="title">Videografi</h2>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#popular">Popular</a></li>
			<li><a data-toggle="tab" href="#recent">Recent</a></li>
		 </ul>
		 <div style="padding: 20px 0;" class="tab-content">
			<div id="popular" class="tab-pane fade in active">
				{get_video_popular}
				<div class="latest-post-blog">
					<div class="crop">{image}</div>
					<p>{title}</p>
					<span>{created_date} | <i class="glyphicon glyphicon-stats"></i>&nbsp;{count_video_stat} views</span>
					<span>In {recent_video_category}</span>
				</div>
				{/get_video_popular}
			</div>
			<div id="recent" class="tab-pane fade">
				{get_video_recent}
				<div class="latest-post-blog">
					<div class="crop">{image}</div>
					<p>{title}</p>
					<span>{created_date} | <i class="glyphicon glyphicon-stats"></i>&nbsp;{count_video_stat} views</span>
					<span>In {recent_video_category}</span>
				</div>
				{/get_video_recent}
			</div>
		  </div>
	</div>
	<div class="clear"></div>
	<div class="sidebar-module">
		<h2 class="blog-post-title">Category</h2>
		<ol class="list-inline list-inline-btn">
			{get_video_category}
				{list}
			{/get_video_category}
		</ol>                 	 
	</div>
	<div class="sidebar-module">
		<h2 class="title">Tag</h2>
		{tag}                	 
	</div>
	<div class="sidebar-module">
		<h2 class="title">Archives</h2>
            <ol class="list-unstyled">
				{get_archives_list}
					{list}
				{/get_archives_list}
            </ol>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() . 'ajax/comment.js'; ?>"></script>
