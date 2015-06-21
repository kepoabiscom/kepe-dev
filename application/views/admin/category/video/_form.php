<?php if($flag == "update") { ?>
<input type="hidden" class="form-control" value="<?php echo $video_category_id; ?>" name="video_category_id">
<?php } ?>
<div class="form-group">
    <label class="col-sm-2">Title</label>
    <div class="col-sm-6">
        <?php $title = ($flag == "update") ? $title : ""; ?>
        <input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Summary</label>
    <div class="col-sm-6">
        <?php $body = ($flag == "update") ? $body : ""; ?>
        <textarea class="form-control" rows="3" value="<?php echo $body; ?>" name="body"><?php echo $body; ?></textarea>
    </div>
</div>
