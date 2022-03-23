<!-- Display status message -->
<?php echo !empty($statusMsg)?'<p class="status-msg">'.$statusMsg.'</p>':''; ?>

<!-- File upload form -->
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Choose Files</label>
        <input type="file" class="form-control" name="files[]" multiple/>
    </div>
    <div class="form-group">
        <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD"/>
    </div>
</form>