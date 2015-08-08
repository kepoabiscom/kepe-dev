<script type="text/javascript" src="<?php echo base_url(); ?>ajax/member_gallery.js"></script>
<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">About Us</li>
			<li class="active">Our Team</li>
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
		    <div class="col-lg-12">
		    	{membership_list}
		        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
		            <a class="{thumbnail}" href="#" data-image-id="" data-toggle="modal" data-title="{nama_lengkap}" data-caption="{nama_lengkap}" data-image="{img}" data-target="#image-gallery">
		                <img class="img-responsive" src="{img}" alt="{nama_lengkap}">
		            </a>
		        </div>
		        {/membership_list}
			</div>
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
