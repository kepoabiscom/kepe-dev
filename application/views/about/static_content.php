<script type="text/javascript" src="<?php echo base_url(); ?>ajax/member_gallery.js"></script>
<style>
.crop {
    max-height: 150px;
    overflow: hidden;
    text-align: center;
    vertical-align: middle;
}

.crop img {
    transition: all 1.4s ease-in-out 0s;
    width: 100% !important;
}

@media (max-width: 767px) {
	.crop {
		max-height: none;
	}
}

@media (max-width: 415px) {
	.crop {
		max-height: none;
	}
}
</style>
<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">About Us</li>
			<li class="active">{title}</li>
			{/get_breadcrumb}
		</ol>
	</div>
	<div class="blog-post">
		<h1 class="page-header">{title}</h1>
		<p class="blog-post-meta">{created_date} by <a href="#">{full_name}</a></p>
		<p>{body}</p>
		<p>{tag}</p>
	</div>
	<div class="blog-post">
		<div class="row">
		    	{membership_list}
				{open_parenthesis}
		        <div class="col-lg-2 col-md-2 col-xs-12 thumb">
					<div style="margin-bottom: 20px;">
						<a  style="margin-bottom: 5px;" class="{thumbnail} img-animation4" href="#" data-image-id="" data-toggle="modal" data-title="{position}" data-caption="{nama_lengkap}" data-image="{img}" data-target="#image-gallery">
							<div class="crop">
								<!--<img class="img-responsive" src="{img}" alt="{nama_lengkap}">-->
								<img src="{loading}" class="lazy" data-original="{img}" alt="{nama_lengkap}">
							</div>
						</a>
						<p class="pull-center" style="font-size: 12px;"><b>{nama_lengkap}</b><br/>{position}</p>
					</div>
		        </div>
				{closing_parenthesis}
		        {/membership_list}
			<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="image-gallery-title"></h4>
						</div>
						<div class="modal-body">
							<img id="image-gallery-image" class="img-responsive" src="">
						</div>
						<div class="modal-footer">
					
							<div class="col-md-2">
								<button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
							</div>

							<div class="col-md-8 text-justify" id="image-gallery-caption">
								This text will be overwritten by jQuery
							</div>

							<div class="col-md-2">
								<button type="button" id="show-next-image" class="btn btn-default">Next</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
