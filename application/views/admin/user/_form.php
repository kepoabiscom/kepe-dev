<?php if($flag == "update") { ?>
    <input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="user_id">
<?php } ?>
<div class="form-group">
    <label class="col-sm-2">Username</label>
    <div class="col-sm-6">
        <?php $readonly = ($flag == "update") ? "readonly" : ""; ?>
        <?php $username = ($flag == "update") ? $username : ""; ?>
        <input type="text" class="form-control" value="<?php echo $username; ?>" name="user_name" <?php echo $readonly; ?>>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Nama</label>
    <div class="col-sm-6">
        <?php $nama_lengkap = ($flag == "update") ? $nama_lengkap : ""; ?>
        <input type="text" class="form-control" value="<?php echo $nama_lengkap; ?>" name="nama_lengkap">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Email</label>
    <div class="col-sm-6">
        <?php $email = ($flag == "update") ? $email : ""; ?>
        <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
    </div>
</div>
<?php if($flag == "create") { ?>
<div class="form-group">
    <label class="col-sm-2">Password</label>
    <div class="col-sm-6">
        <input type="password" class="form-control" id="password" name="password">
    </div>
</div>
<?php } ?>
<div class="form-group">
    <label class="col-sm-2">Role</label>
    <div class="col-sm-6">
        <select class="form-control" id="role" name="user_role">
            <option value="superadmin">Superadmin</option>
            <option value="admin">Admin</option>
            <option value="crew">Crew</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Position</label>
    <div class="col-sm-6">
        <?php $position = ($flag == "update") ? $position : ""; ?>
        <input type="test" class="form-control" value="<?php echo $position; ?>" name="position">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">Description</label>
    <div class="col-sm-6">
        <?php $desc = ($flag == "update") ? $description : ""; ?>
        <textarea class="form-control" rows="3" value="<?php echo $desc; ?>" name="body"></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2">File input</label>
    <div class="col-sm-6">
        <input type="file" name="userfile">
    </div>
</div>
