
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">    
<div class="form-group">
<label>Title <span class="required">*</span></label>
<input type="text" name="Title" id="Title" class="form-control" value="<?php echo $page_title;?>">
</div>

<label class="form-label">Upload File  <span class="required">*</span></label><br>                   
<input type="file" id="file" name="userfile" size="20" />

<input type="submit" id="submit" name="submit"/>
</form>


<script>
$(document).ready(function(){
    jQuery(document).on('click','#submit',function(e) {
        var file_data = $("#file").prop('files')[0]; 
        var form_data = new FormData();
        return false; 
        var Title=$("#Title").val();
        var ext = $("#file").val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png','jpg','jpeg']) == -1)   {
            alert("only jpg and png images allowed");
            return;
        }  
        var picsize = (file_data.size);
        if(picsize > 2097152) /* 2mb*/
        {
            alert("Image allowd less than 2 mb")
            return;
        }
        form_data.append('file', file_data);  
        form_data.append('Title',Title);  
        $.ajax({
            url: "<?php echo base_url("Attachment/ManageAttachment");?>", /*point to server-side PHP script */
            dataType: 'text',  
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(res){
                $(".alert_success").show();
                $("#success_message").text("Attachment created successfully !");
                window.location.hash = '#success_message';
                window.location = `<?php echo base_url()?>Attachment`;
            
            }
        });
    });
})
</script>
</body>
</html>