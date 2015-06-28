<div class="container padding-top-large">
                <h2>
                    <strong class="bold-text">TETANG</strong>
                    <span class="light-text main-color">KAMI</span>
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
                <p class="margin-bottom-medium wow slideInUp animated" style="text-align: justify; visibility: visible; animation-name: slideInUp;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse" id="collapseOne">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer far.
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->

                            <!-- =========================
                              Collapsible Panel 2
                            ============================== -->
                            <div class="panel panel-default">
                                <div id="headingTwo" role="tab" class="panel-heading">
                                    <div class="panel-title">
                                        <a aria-controls="collapseTwo" aria-expanded="false" href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="collapsed">
                                            <span class="state"><strong>+</strong></span>
                                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div aria-labelledby="headingTwo" role="tabpanel" class="panel-collapse collapse" id="collapseTwo">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer far.
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->

                            <!-- =========================
                              Collapsible Panel 3
                            ============================== -->
                            <div class="panel panel-default">
                                <div id="headingThree" role="tab" class="panel-heading">
                                    <div class="panel-title">
                                        <a aria-controls="collapseThree" aria-expanded="false" href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="collapsed">
                                            <span class="state"><strong>+</strong></span>
                                            <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</strong>
                                        </a>
                                    </div>
                                </div> <!-- *** end panel-heading *** -->
                                <div aria-labelledby="headingThree" role="tabpanel" class="panel-collapse collapse" id="collapseThree">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer far.
                                    </div>
                                </div> <!-- *** end collapsed item *** -->
                            </div> <!-- *** end panel *** -->
                        </div> <!-- *** end panel-group *** -->
                    </div> <!-- *** end col-md-8 *** -->
                </div>
            </div>
<div class="col-md-12">
     <div class="row">
		<div class="col-md-12">
			<h2><strong class="bold-text">BERITA</strong></h2>
		</div>
		{get_news}
		<div class="col-md-4">
			<div class="recent_post">
				<div>
					<h5>
						{title}
					</h5>
					<p><em>{created_date}</em></p>		
					{image}
					<br>
					<p style="text-align: justify;">
					{summary}
					</p>
					<p>
						<em>By <a href="#">{full_name}</a></em><br>
						<em>Kategori : {category}</em>
					</p>
				</div>
			</div>                	 
		</div>
		{/get_news}
		<br>
		<div class="col-md-12" style="text-align: center; margin-top: 20px;">
			<a class="btn btn-default" href="berita.php">Berita Selengkapnya</a>
		</div>
    </div>
</div>
<div class="col-md-12">
     <div class="row">
		<div class="col-md-12">
			<h2><strong class="bold-text">ARTIKEL</strong></h2>
		</div>
		{get_article}
        {no_recent_art}
		<div class="col-md-3">
			<div class="recent_post">
				<div>
					<h5>
						{title}
					</h5>
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
			<a class="btn btn-default" href="#">Artikel Selengkapnya</a>
		</div>
    </div>
</div>
<div class="col-md-12">
	<h2><strong class="bold-text">GOOGLE MAP</strong></h2>
	<div style="padding: 5px; background-color: #ddd;">
		<div id="googleMap" style="width:100%;height:305px; border: 1px solid #fff;"></div>
	</div>
</div>