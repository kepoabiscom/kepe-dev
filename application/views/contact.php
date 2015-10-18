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
	<h1>Contact Us</h1>
	<div style="padding: 5px; background-color: #ddd;">
		<div id="googleMap" style="width:100%;height:310px; border: 1px solid #fff;"></div>
	</div>
</div>
<div class="col-md-6">
	<h4>Send Message to <strong>KepoAbis.com</strong></h4>
	<div class ="msg"></div>
	<form id="form-contact" action="<?php echo base_url(). 'contact/send_message'; ?>" class="bs-example bs-example-form" role="form" method="post" class="form-horizontal">
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" class="form-control" placeholder="Your Name" value="" name="from_name">
			</div>
		</div>
		<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" class="form-control"  placeholder="Your Email" value="" name="email" >
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
		<div id="captcha">
			<div class="g-recaptcha" data-sitekey="<?php echo API_KEY_RECAPTCHA; ?>"></div>
        </div>
        
        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script><br>
		<div class="form-group">
			<input type="submit" value="SEND" id='submit' name ='submit' class="btn btn-primary">
			<input type="reset" value="CLEAR" class="btn btn-primary">
		</div>
	</form>
</div>
<div class="col-md-6">
	{contact_footer}                     
</div>

<script type="text/javascript" src="<?php echo base_url() . 'ajax/send_message_contact.js'; ?>"></script>
