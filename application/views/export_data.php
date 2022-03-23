<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title>Export MySQL data to CSV file in CodeIgniter</title>
</head>
<body>

	<!-- Export Data -->
	<a class="btn btn-primary m-5" href='<?php echo  base_url('/Export/exportCSV'); ?>'>Export</a><br><br>

	<!-- User Records -->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($usersData as $key=>$val)
			{
				echo "<tr>";
				echo "<td>".$val['name']."</td>";
				echo "<td>".$val['email']."</td>";
				echo "<td>".$val['phone']."</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>