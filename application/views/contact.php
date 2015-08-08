<div class="col-md-12">
	<div>
		<ol class="breadcrumb">
			{get_breadcrumb}
			<li><a href="{home}">Home</a></li>
			<li class="active">Contact</li>
			{/get_breadcrumb}
		</ol>
	</div>
</div>
<div class="col-md-12" style="margin-bottom: 20px;">
	<h1>Contact</h1>
	<div style="padding: 5px; background-color: #ddd;">
		<div id="googleMap" style="width:100%;height:310px; border: 1px solid #fff;"></div>
	</div>
</div>
<div class="col-md-6">
	{contact_footer}                     
</div>
<div class="col-md-6">
	{alert}
	<form action="{sending_message}" class="bs-example bs-example-form" role="form" method="post" class="form-horizontal">
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" class="form-control" placeholder="Name" value="" name="name">
			</div>
		</div>
		<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" class="form-control"  placeholder="Email" value="" name="email" >
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" class="form-control"  placeholder="Subject" value="" name="subject" >
		</div>
		</div>
		<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
			<textarea class="form-control" placeholder="Message" id="message" name="message"></textarea>
		</div>
		</div>
		<div class="form-group">
			<input type="reset" value="CLEAR" class="btn btn-primary">
			<input type="submit" value="SEND" class="btn btn-primary">
		</div>
	</form>
</div>
