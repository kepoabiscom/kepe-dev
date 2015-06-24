<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			<li class="active">Beranda</li>
		</ol>
	</div>
</div>
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<div style="font-size: 24px; margin-bottom: 10px;">Recent Video</div>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic" data-slide-to="3"></li>
				<li data-target="#carousel-example-generic" data-slide-to="4"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="<?php echo base_url('assets/img/portfolio/img (1).jpg'); ?>" alt="Ace Hardware untuk Indonesia - ACE Hardware Video Competition">
					<div class="carousel-caption">
						<h3>
							<a href="1914-translation-by-h-rackham.php">
								Ace Hardware untuk Indonesia - ACE Hardware Video Competition
							</a>
						</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat aliquet lobortis. Vestibulum non lectus vel metus sagittis vestibulum non in augue. In tincidunt pretium risus sit amet fringilla. </p>
					</div>
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/img/portfolio/img (9).jpg'); ?>" alt="The Youthpreneur Your future is your choice #VirusWirausaha">
					<div class="carousel-caption">
						<h3>
							<a href="1914-translation-by-h-rackham.php">
								The Youthpreneur Your future is your choice #VirusWirausaha
							</a>
						</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat aliquet lobortis. Vestibulum non lectus vel metus sagittis vestibulum non in augue. In tincidunt pretium risus sit amet fringilla. </p>
					</div>
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/img/portfolio/img (3).jpg'); ?>" alt="Enjoy Jakarta Enjoy Your Day, Nikmati Caramu">
					<div class="carousel-caption">
						<h3>
							<a href="1914-translation-by-h-rackham.php">
								Enjoy Jakarta Enjoy Your Day, Nikmati Caramu
							</a>
						</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat aliquet lobortis. Vestibulum non lectus vel metus sagittis vestibulum non in augue. In tincidunt pretium risus sit amet fringilla. </p>
					</div>
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/img/portfolio/img (4).jpg'); ?>" alt="Like Father Like Daughter">
					<div class="carousel-caption">
						<h3>
							<a href="1914-translation-by-h-rackham.php">
								Like Father Like Daughter
							</a>
						</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat aliquet lobortis. Vestibulum non lectus vel metus sagittis vestibulum non in augue. In tincidunt pretium risus sit amet fringilla. </p>
					</div>
				</div>
				<div class="item">
					<img src="<?php echo base_url('assets/img/portfolio/img (10).jpg'); ?>" alt="This Is My Active Life - Yamaha">
					<div class="carousel-caption">
						<h3>
							<a href="1914-translation-by-h-rackham.php">
								This Is My Active Life - Yamaha
							</a>
						</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat aliquet lobortis. Vestibulum non lectus vel metus sagittis vestibulum non in augue. In tincidunt pretium risus sit amet fringilla. </p>
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="row">
		<div class="col-md-12">
			<div class="sidebar-module">
				<div style="font-size: 24px; margin-bottom: 10px;">Recent Article</div>
					<ul class="recent_post">
					<?php for($i=0; $i<3; $i++){ ?>
					<li>
						<a href="#"><img width="70px" align="left" src="<?php echo base_url('assets/img/article/portfolio-10.jpg'); ?>" alt="" style="margin-right: 10px;"></a>
						<div>
							<a href="article-section-11033-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc.php">Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</a>
						</div>
						1th January, 2014
						<div class="clear"></div>
					</li>
					<?php } ?>
					</ul>                	 
			</div>
			<!--
			<div class="sidebar-module">
				<div style="font-size: 24px; margin-bottom: 10px;">Twitter Timeline</div>
				<div>
					<a class="twitter-timeline"  href="https://twitter.com/KepoAbisCom"  data-widget-id="459590213916848128">Tweets by @KepoAbisCom</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
			</div>
			-->
		</div>
	</div>
</div>
<br>
<br>
<div class="col-md-12">
     <div class="row">
		<div class="col-md-12">
			<div style="font-size: 24px; margin-top: 20px;">Recent Article</div>
		</div>
		<?php for($i=0; $i<3; $i++){ ?>
		<div class="col-md-4">
			<div class="recent_post">
				<div>
					<h5>
						<a href="news-section-11033-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc.php">Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</a>
					</h5>
					<p><em>08 Nov 2012 13:43:03 </em></p>		
					<img class="img-responsive" alt="Responsive image" src="<?php echo base_url('assets/img/portfolio/img (1).jpg'); ?>"/>
					<br>
					<p style="text-align: justify;">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer volutpat aliquet lobortis. Vestibulum non lectus vel metus sagittis vestibulum non in augue. In tincidunt pretium risus sit amet fringilla. 
					</p>
					<div style="text-align: right; margin: 20px 10px 10px 10px;">
					<a href="news-section-11033-of-de-finibus-bonorum-et-malorum-written-by-cicero-in-45-bc.php">Selengkapnya</a>
				</div>
				</div>
			</div>                	 
		</div>
		<?php } ?>
    </div>
</div>
<div class="col-md-12">
	<div style="font-size: 24px; margin-bottom: 10px;">Google Map</div>
	<div style="padding: 5px; background-color: #ddd;">
		<div id="googleMap" style="width:100%;height:305px; border: 1px solid #fff;"></div>
	</div>
</div>