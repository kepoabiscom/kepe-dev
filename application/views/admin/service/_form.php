<script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
<input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id">
<?php if($flag == "update") { ?>
<input type="hidden" class="form-control" value="<?php echo $service_id; ?>" name="service_id">
<input type="hidden" class="form-control" value="<?php echo $image_id; ?>" name="image_id">
<?php } ?>
<div class="form-group">
    <label class="col-sm-2">Title</label>
    <div class="col-sm-6">
        <?php $title = ($flag == "update") ? $title : ""; ?>
        <input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2">Tag</label>
    <div class="col-sm-6">
        <?php $tag = ($flag == "update") ? $tag : ""; ?>
        <input type="text" class="form-control" value="<?php echo $tag; ?>" name="tag">
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2">Status</label>
    <div class="col-sm-6">
        <select class="form-control" id="status" name="status">
            <?php echo $status; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2">Divisi Image</label>
    <div class="col-sm-6">
        <input type="file" name="userfile" onchange="read_image(this);">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Preview</label>
    <div class="col-sm-6">
        <?php $image = ($flag == "update") ? $image : "assets/img/default-image.png"; ?>
        <img id="img_prev" style="border-radius:25px; box-shadow: 10px 10px 5px #888888; max-width:95%;border:6px groove #545565;" src="<?php echo base_url() . $image;?>"  width="150" height="200"/>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2">Summary</label>
    <div class="col-sm-6">
        <?php $summary = ($flag == "update") ? $summary : ""; ?>
        <textarea class="form-control" name="summary" rows="3"><?php echo $summary; ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2">Body</label>
    <div class="col-sm-6">
        <?php $body = ($flag == "update") ? $body : ""; ?>
        <textarea class="form-control" name="body" rows="3"><?php echo $body; ?></textarea>
    </div>
</div>