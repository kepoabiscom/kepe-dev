<?php /*
<style>
	.slider_description {
		color: #ccc;
	}
	
	.slider_description p {
		margin-bottom: 0px;
	}
	
	.flex-viewport{
		overflow: none;
	}
</style>
<!-- Slider -->
<div id="slider" style="background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #4c0000 0%, #870000 10%, #870000 100%) repeat scroll 0 0;">

	<!-- Flexslider Start-->
	<div class="flexslider">
		<ul class="slides">
			{get_all}
			<li class="custom-slide" style="background: #870000 repeat scroll 0 0;">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="slider_description">
								<h2 style="color: #fff;">{title}</h2>
								<div style="margin-bottom: 10px;">{summary}</div>
							</div>
						</div>
						<div class="col-md-6">
							<img class="img-responsive" style="width: 536px;float: right; margin-top: 20px;" alt="{title}" src="{path_image}">
						</div>
					</div>
				</div>
			</li>
			{/get_all}
		</ul>
	</div>
	<!-- Flexslider End-->		
</div>
<!-- End Slider -->

<script src=<?php echo base_url('assets/js/flexslider_slide.js'); ?>></script>
*/ ?>