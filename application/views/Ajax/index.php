<!DOCTYPE html>
<html>
<head>
<title>CI Example</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row my-5">
        <div class="col-2">
            <a href="<?php echo base_url();?>Ajax_crud/register" class="btn btn-primary btn-lg btn-block">Insert Data Form</a>
            </div>
            <div class="col-2">
            <a href="<?php echo base_url();?>Ajax_crud/view" class="btn btn-primary btn-lg btn-block">Retrive Data Form</a>
            </div>
            <div class="col-2">
            <a href="User/sign_up" class="btn btn-primary btn-lg btn-block">Sign Up User</a>
            </div>
            <div class="col-2">
            <a href="User/login" class="btn btn-primary btn-lg btn-block">Login User</a>
            </div>
            <div class="col-2">
            <a href="User/change_pass" class="btn btn-primary btn-lg btn-block">Password Change</a>
            </div>
            <div class="col-2">
            <a href="User/forgot_pass" class="btn btn-primary btn-lg btn-block">Forot Password</a>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>