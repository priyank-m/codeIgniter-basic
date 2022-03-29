<!DOCTYPE html>
<html>
  <head>
     <title>DataTables AJAX Pagination with Search and Sort in CodeIgniter 3</title>

     <!-- Datatable CSS -->
     <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

     <!-- jQuery Library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <!-- Datatable JS -->
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  </head>
  <body>

     <!-- Table -->
     <table id='empTable' class='display dataTable'>

       <thead>
         <tr>
           <th>Employee name</th>
           <th>Email</th>
           <th>Gender</th>
           <th>Salary</th>
           <th>City</th>
         </tr>
       </thead>

     </table>

     <!-- Script -->
     <script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>/Employee/empList'
          },
          'columns': [
             { data: 'emp_name' },
             { data: 'email' },
             { data: 'gender' },
             { data: 'salary' },
             { data: 'city' },
          ]
        });
     });
     </script>
  </body>
</html>