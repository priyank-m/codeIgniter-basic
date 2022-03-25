<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2 class="text-center mt-5">AJAX CRUD</h2>
  <a href="<?php echo base_url("Ajax_crud/register");?>" class="btn btn-primary btn-md my-5">Add</a>
	<table id="item-list" class="table table-bordered table-sm" >
    <thead>
      <tr>
		<th>Sr.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
		<th>City</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody id="table">
      
    </tbody>
  </table>
</div>

<!-- Modal Update-->
<div class="modal fade" id="update_country" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>
			 
			</div>
			<div class="modal-body">
			
				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="name" id="name_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--2-->
				<div class="row">
					<div class="col-md-3">
					    <label>Email</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="email" id="email_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--3-->
				<div class="row">
					<div class="col-md-3">
					    <label>Phone</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="phone" id="phone_modal" class="form-control-sm" required>
					</div>	
				</div>
				<!--4-->
				<div class="row">
					<div class="col-md-3">
					    <label>City</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="city" id="city_modal" class="form-control-sm" required>
					</div>	
				</div>
				<input type="hidden" name="id" id="id_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;"><button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Save</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
			
		  </div>
		  </div>
		</div>
	</div>
<!-- Modal End-->

<script>
	$.ajax({
		url: "<?php echo base_url("Ajax_crud/viewajax");?>",
		type: "POST",
		cache: false,
		success: function(data){
			//alert(data);
			$('#table').html(data); 
		}
	});
    $(function () {
		$('#update_country').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); 
			var id = button.data('id');
			var name = button.data('name');
			var email = button.data('email');
			var phone = button.data('phone');
			var city = button.data('city');
			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#email_modal').val(email);
			modal.find('#phone_modal').val(phone);
			modal.find('#city_modal').val(city);
			modal.find('#id_modal').val(id);
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "<?php echo base_url("Ajax_crud/savedata");?>",
			type: "POST",
			data:{
				type: 3,
				id: $('#id_modal').val(),
				name: $('#name_modal').val(),
				email: $('#email_modal').val(),
				phone: $('#phone_modal').val(),
				city: $('#city_modal').val()
			},
			cache: false,
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_country').modal().hide();
					alert('Data updated successfully !');
					location.reload();					
				}
			}
		});
	}); 

    $(document).on("click", ".delete", function() { 
	//alert("Success");
    if (confirm('Are you sure you want to delete this?')) {
		var $ele = $(this).parent().parent();
		$.ajax({
			url: "<?php echo base_url("Ajax_crud/deleterecords");?>",
			type: "POST",
			cache: false,
			data:{
				type: 2,
				id: $(this).attr("data-id")
			},
			success: function(dataResult){
				// alert(dataResult);
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$ele.fadeOut().remove();
                    //location.reload();	
				}
			}
		});
        }
	});
</script>
</body>
</html>