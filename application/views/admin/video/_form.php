<script type="text/javascript" src="<?php echo base_url() . 'ajax/general.js'; ?>"></script>
<?php if($flag != "update") { ?>
<input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id">
<?php } else { ?>
<input type="hidden" class="form-control" value="<?php echo $video_id; ?>" name="video_id">
<input type="hidden" class="form-control" value="<?php echo $image_id; ?>" name="image_id">
<?php } ?>
<div class="form-group">
    <label class="col-sm-2">Title</label>
    <div class="col-sm-6">
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
        <input type="text" class="form-control" value="<?php echo $tag; ?>" name="tag">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Producer</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $producer; ?>" name="producer">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Story Ide</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $story_ide; ?>" name="story_ide">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Script Writer</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $screenwriter; ?>" name="screenwriter">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Film Director</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $film_director; ?>" name="film_director">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Cameraman</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $cameramen; ?>" name="cameramen">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Artist</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="5" name="artist"><?php echo $artist; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Host</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $host; ?>" name="host">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Editor</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $editor; ?>" name="editor">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">URL Youtube</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" value="<?php echo $url; ?>" name="url">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Duration</label>
    <div class="col-sm-6">
        <input type="time" class="form-control" value="<?php echo $duration; ?>" name="duration">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Status</label>
    <div class="col-sm-6">
        <select class="form-control" id="status" name="status">
            <?php if($status == "unpublished") { ?>
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
    <label class="col-sm-2">Thumbnail (1200x1200)</label>
    <div class="col-sm-6">
        <input type="file" name="userfile" onchange="read_image(this);" accept="image/*">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Preview</label>
    <div class="col-sm-6">
        <img id="img_prev" style="border-radius:25px; box-shadow: 10px 10px 5px #888888; max-width:95%;border:6px groove #545565;" src="<?php echo base_url() . $image;?>"  width="150" height="200"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Description</label>
    <div class="col-sm-6">
        <textarea class="form-control" rows="15" name="description"><?php echo $description; ?></textarea>
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