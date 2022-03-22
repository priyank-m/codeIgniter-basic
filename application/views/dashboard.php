<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<a href="sign_up">Add</a>    
<table class="table">
  <thead class="thead-dark">
    <tr>
        <th>Sr No</th>
        <th>Name</th>
        <th>Email Id</th>
        <th>Phone</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
            $i=1;
            foreach($data as $row)
            {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$row->name."</td>";
            echo "<td>".$row->email."</td>";
            echo "<td>".$row->phone."</td>";
            echo "<td><a href='updatedata?id=".$row->id."'>Update</a></td>";
            echo "<td><a href='deletedata?id=".$row->id."'>Delete</a></td>";
            echo "</tr>";
            $i++;
            }
        ?>
    </tr>
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>