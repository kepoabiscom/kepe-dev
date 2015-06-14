<?php if($flag == "update") { ?>
<input type="hidden" class="form-control" value="<?php echo $video_id; ?>" name="video_id">
<?php } ?>
<div class="form-group">
    <label class="col-sm-2">Title</label>
    <div class="col-sm-6">
        <?php $title = ($flag == "update") ? $title : ""; ?>
        <input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Category</label>
    <div class="col-sm-6">
        <select class="form-control" id="video_category_id" name="video_category_id">
        <?php echo $title_category; ?>
        </select>
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
    <label class="col-sm-2">Story Ide</label>
    <div class="col-sm-6">
        <?php $story_ide = ($flag == "update") ? $story_ide : ""; ?>
        <input type="text" class="form-control" value="<?php echo $story_ide; ?>" name="story_ide">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Screen Writer</label>
    <div class="col-sm-6">
        <?php $screenwriter = ($flag == "update") ? $screenwriter : ""; ?>
        <input type="text" class="form-control" value="<?php echo $screenwriter; ?>" name="screenwriter">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Film Director</label>
    <div class="col-sm-6">
        <?php $film_director = ($flag == "update") ? $film_director : ""; ?>
        <input type="text" class="form-control" value="<?php echo $film_director; ?>" name="film_director">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Cameraman</label>
    <div class="col-sm-6">
        <?php $cameramen = ($flag == "update") ? $cameramen : ""; ?>
        <input type="text" class="form-control" value="<?php echo $cameramen; ?>" name="cameramen">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Artist</label>
    <div class="col-sm-6">
        <?php $artist = ($flag == "update") ? $artist : ""; ?>
        <textarea class="form-control" rows="4" value="<?php echo $artist; ?>" name="artist"><?php echo $artist; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">URL Youtube</label>
    <div class="col-sm-6">
        <?php $url = ($flag == "update") ? $url : ""; ?>
        <input type="text" class="form-control" value="<?php echo $url; ?>" name="url">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Duration</label>
    <div class="col-sm-6">
        <?php $duration = ($flag == "update") ? $duration : ""; ?>
        <input type="time" class="form-control" value="<?php echo $duration; ?>" name="duration">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Status</label>
    <div class="col-sm-6">
        <select class="form-control" id="status" name="status">
            <?php if($flag != "update" or $status == "unpublished") { ?>
            <option value="unpublished">Unpublished</option>
            <option value="pending">Pending</option>
            <option value="published">Published</option>
            <?php } else { ?>
            <?php if ($status == "published") { ?>
            <option value="published">Published</option>
            <option value="unpublished">Unpublished</option>
            <option value="pending">Pending</option>
            <?php } else { ?>
            <option value="pending">Pending</option>
            <option value="published">Published</option>
            <option value="unpublished">Unpublished</option>
            <?php } } ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Description</label>
    <div class="col-sm-6">
        <?php $description = ($flag == "update") ? $description : ""; ?>
        <textarea class="form-control" rows="3" value="<?php echo $description; ?>" name="description"><?php echo $description; ?></textarea>
    </div>
</div>
<!--
<div class="form-group">
    <label class="col-sm-2">File input</label>
    <div class="col-sm-6">
        <input type="file" name="userfile">
    </div>
</div>
-->