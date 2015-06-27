<script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
<input type="hidden" class="form-control" value="<?php echo $setting_id; ?>" name="setting_id">
<input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id">
<div class="form-group">
    <label class="col-sm-2">Title</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Email 1</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" value="<?php echo $contact_email_1; ?>" name="contact_email_1">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Email 2</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" value="<?php echo $contact_email_2; ?>" name="contact_email_2">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Telephone 1</label>
    <div class="col-sm-6">
        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" value="<?php echo $contact_telphone_1; ?>" name="contact_telphone_1">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Telephone 2</label>
    <div class="col-sm-6">
        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" value="<?php echo $contact_telphone_2; ?>" name="contact_telphone_2">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Fax</label>
    <div class="col-sm-6">
        <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="form-control" value="<?php echo $contact_fax; ?>" name="contact_fax">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Lat</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_lat; ?>" name="contact_lat">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Long</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_long; ?>" name="contact_long">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Facebook</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_facebook; ?>" name="contact_facebook">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Twitter</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_twitter; ?>" name="contact_twitter">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Contact Google Plus</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $contact_googleplus; ?>" name="contact_googleplus">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Logo</label>
    <div class="col-sm-6">
        <input type="file" name="userfile" onchange="read_image(this);">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2">Preview</label>
    <div class="col-sm-6">
        <img id="img_prev" style="border-radius:25px; box-shadow: 10px 10px 5px #888888; max-width:95%;border:6px groove #545565;" src="<?php echo base_url() . 'assets/img/' . $logo_name;?>"  width="150" height="200"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Background Color</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $background_color; ?>" name="background_color">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Address</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="3" value="<?php echo $contact_address; ?>" name="contact_address"><?php echo $contact_address; ?></textarea>    
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Footer</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="3" value="<?php echo $footer; ?>" name="footer"><?php echo $footer; ?></textarea>    
    </div>
</div>

