<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #4c0000 0%, #870000 10%, #870000 100%) repeat scroll 0 0;">
		<div id="aei-navbar-top-img" style="background-color: #333333">
             <div class="container">
                 <div class="row">
                    <div class="col-md-6">
                            <!--<img class="img-responsive" alt="" src="assets/templates/thirteen/img/weblogohor-sm-2.png">-->
						<div class="title">{site_name} | {tagline}</div>
                    </div>
                    <div class="col-md-6">
                    </div>
               </div>
            </div>
        </div>
      <div class="container" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="#">Project name</a>-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<ul id="-aei-navbar-nav" class="nav navbar-nav">
				{get_menu}
                <li class="{active}">
					<a title="{name}" href="{url}">
						{name}
					</a> 
				</li>
				{/get_menu}
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						ABOUT US &nbsp;<span class="caret"></span>
					</a>
					 <ul class="dropdown-menu" role="menu">
						<li><a href="{membershipform}">MEMBERSHIP FORM</a></li>
						<li><a href="{membership}">MEMBERSHIP</a></li>
						<li><a href="{organization}">ORGANIZATIONS</a></li>
						<li><a href="{history}">HISTORY</a></li>
					</ul>
				</li>
			</ul>
			<form role="search" class="navbar-form navbar-right" method="get" action="home/search">
				<div style="width: 200px;" class="input-group">
					<input type="text" placeholder="Search" class="form-control input-sm" value="" name="search">
					<input type="hidden" value="113" name="id">
					<span class="input-group-btn">
						<button class="btn btn-default btn-sm" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</form>
        </div><!--/.nav-collapse -->
      </div>
</nav>