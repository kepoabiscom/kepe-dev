<div class="col-md-12">
	<div clas="row">
		<h2>
			<strong class="bold-text">ABOUT</strong>
			<span class="light-text main-color">US</span>
		</h2>
		<div class="line main-bg"></div>
		<div class="row margin-bottom-medium">
			<div class="col-md-8">
				<div data-wow-duration="2s" class="jumbo-text light-text margin-top-medium wow slideInLeft animated" style="visibility: visible; animation-duration: 2s; animation-name: slideInLeft;">
					Kepoabis.com is a <strong>videography community</strong>. Our Focus is to create a creative videos which can inspiring people to aplicated to their live what we showed.
				</div>
			</div>
			<div class="col-md-4">
				<img  class="img-responsive" alt="" src="<?php echo base_url('assets/img/logo.png'); ?>">
			</div>
			<div class="clearfix"></div>
		</div>
		<p class="margin-bottom-medium wow slideInUp animated" style="text-align: justify; visibility: visible; animation-name: slideInUp;">
			Kepoabis.com is a videography community based in Jakarta, Indonesia. The embryo of this community was created back in October 2013 by 4 co-founders, Haris Millah Muhammad, Ahmad Khairi, Syahrul Ramadhan, and Herman Wahyudi.
			<br>
			<br>
			Our Focus is to create a creative videos which can inspiring people to aplicated to their live what we showed. We also act as a media partner for any client who needs a creative documentation. We commit to give a full service that help our clients expand their digital reach. 
		</p>
		<div class="row margin-top-large">
			<div class="col-md-8">
				<div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">

					<!-- =========================
					Collapsible Panel 1
					============================== -->
					<div class="panel panel-default">
						<div id="headingOne" role="tab" class="panel-heading">
							<div class="panel-title">
								<a aria-controls="collapseOne" aria-expanded="true" data-parent="#accordion" data-toggle="collapse" href="#collapseOne">
										<span class="state"><strong>+</strong></span>
										<strong>Mission</strong>
								</a>
							</div>
						</div> <!-- *** end panel-heading *** -->
						<div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse" id="collapseOne">
							<div class="panel-body">
								To shows an emerging social reality that we pack as a video.
								<br>To give various entertaining and unique info. 
								<br>Insert a humour value in our video without eliminating the substance of video’s topic.
							</div>
						</div> <!-- *** end collapsed item *** -->
					</div> <!-- *** end panel *** -->
				</div> <!-- *** end panel-group *** -->
			</div> <!-- *** end col-md-8 *** -->
		</div>
	</div>
</div>
<div class="col-md-12">
     <div class="row">
		<div class="col-md-12">
			<h2><strong class="bold-text">NEWS</strong></h2>
		</div>
		{get_news}
		<div class="col-md-4">
			<div class="recent_post">
				<div>
					<div class="title">{title}</div>
					<p><em>{created_date}</em></p>		
					{image}
					<br>
					<p style="text-align: justify;">
					{summary}
					</p>
					<p>
						<em>By <a href="#">{full_name}</a></em><br>
						<em>Category : {category}</em>
					</p>
				</div>
			</div>                	 
		</div>
		{/get_news}
		<br>
		<div class="col-md-12" style="text-align: center; margin-top: 20px;">
			<a class="btn btn-default" href="<?php echo base_url('news'); ?>">View All News</a>
		</div>
    </div>
</div>

<div class="col-md-12">
     <div class="row">
		<div class="col-md-12">
			<h2><strong class="bold-text">ARTICLE</strong></h2>
		</div>
		{get_article}
        {no_recent_art}
		<div class="col-md-6">
			<div class="recent_post">
				<div>
					<div class="title">{title}</div>
					<p><em>{created_date}</em></p>		
					{image}
					<p style="text-align: justify;">
					{summary}
					</p>
					<p>
						<em>{full_name}</a></em><br>
						<em>{category}</em>
					</p>
				</div>
			</div>                	 
		</div>
		{/get_article}
		<br>
		<div class="col-md-12" style="text-align: center; margin-top: 20px;">
			<a class="btn btn-default" href="<?php echo base_url('article'); ?>">View All Articles</a>
		</div>
    </div>
</div>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>