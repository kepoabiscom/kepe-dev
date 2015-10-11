<script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<script>
      $(document).ready(function(){
          $('#dp1').datepicker({
            format: 'yyyy-mm-dd'
           });
      });
</script>
<?php if($flag == "update") { ?>
    <input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id">
<?php } ?>
<div class="form-group">
    <label class="col-sm-3">Username</label>
    <div class="col-sm-6">
        <?php $readonly = ($flag == "update") ? "readonly" : ""; ?>
        <input type="text" class="form-control" onkeyup="username_check(this.value)" value="<?php echo $username; ?>" name="user_name" <?php echo $readonly; ?>>
        <span id="v_username"></span>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3">Name</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $nama_lengkap; ?>" name="nama_lengkap">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3">Date Of Birth</label>
    <div class="col-sm-6">
        <input type="text" id="dp1" class="form-control" value="<?php echo $date_of_birth; ?>" name="date_of_birth">
    </div>   
</div>
<div class="form-group">
    <label class="col-sm-3">Phone Number</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" value="<?php echo $phone_number; ?>" name="phone_number">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3">Email</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3">Place Of Birth</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $place_of_birth; ?>" name="place_of_birth">
    </div>
</div>
<?php if($flag == "create") { ?>
<div class="form-group">
    <label class="col-sm-3">Password</label>
    <div class="col-sm-6">
        <input type="password" class="form-control" id="password" name="password">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3">Re-Password</label>
    <div class="col-sm-6">
        <input type="password" class="form-control" id="re_password" name="re_password">
    </div>
</div>
<?php } ?>
<div class="form-group">
    <label class="col-sm-3">Position</label>
    <div class="col-sm-6">
        <input type="test" class="form-control" value="<?php echo $position; ?>" name="position">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Address</label>
    <div class="col-sm-12">
        <textarea class="form-control" rows="6" name="address"><?php echo $address; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Description</label>
    <div class="col-sm-12">
        <textarea class="form-control" rows="6" name="body"><?php echo $desc; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Photo</label>
    <div class="col-sm-6">
        <input type="file" name="userfile" onchange="read_image(this);">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Preview</label>
    <div class="col-sm-6">
        <img id="img_prev" style="border-radius:25px; box-shadow: 10px 10px 5px #888888; max-width:95%;border:6px groove #545565;" src="<?php echo $image; ?>"/>
    </div>
</div>

