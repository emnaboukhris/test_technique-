<?php
$conn="" ;
include_once 'jsonData.php';

?>
<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Module 2</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
  <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css" >

</head>


<body>

   <header>
     <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav" >
          <li><a href="../module1/index.php">Module 1</a></li>
          <li><a href="tableau.html">Module 2</a></li>
        </ul>
         <p class="navbar-text" >Voguel Consulting - Test technique</p>
     </nav>
   </header>

   <div class="title">MODULE 2</div>

   <div class="container">
     <table class="table table-fluid" id="myTable" >
       <thead style="background-color: "#CCCCCC ">
         <tr>
           <th scope="col">id</th>
           <th scope="col">userId</th>
           <th scope="col">title</th>
           <th scope="col">completed</th>
           <th scope="col">delete</th>
         </tr>
       </thead>

       <tbody>

       <?php

       $results = mysqli_query($conn, "SELECT * FROM data");
       $liste=$results ;


       if (!empty($liste)) {
           foreach ($liste as  $l) {
               ?>

               <tr>
                   <th><?php echo $l['id']; ?></th>
                   <th><?php echo $l['userId']; ?></th>
                   <th><?php echo $l['title']; ?></th>
                   <th><?php echo $l['completed']; ?></th>

                   <th>
                       <a onclick="return confirm('Are you sure you want to delete this ?')" href="delete.php?id=<?= $l['id'] ?>"> Delete </a>

                   </th>

               </tr>
               <?php
           }
       }


       ?>
       <script>
           jQuery(document).ready(function($) {
               $('#myTable tfoot th').each( function () {
                   var title = $(this).text();
                   $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
               } );

               // DataTable
               $('#myTable').DataTable({

                   initComplete: function () {
                       // Apply the search
                       this.api().columns().every( function () {
                           var that = this;

                           $( 'input', this.footer() ).on( 'keyup change clear', function () {
                               if ( that.search() !== this.value ) {
                                   that
                                       .search( this.value )
                                       .draw();
                               }
                           } );
                       } );
                   }
               });
           } );
       </script>

         </tbody>

        <tfoot>
          <tr>
            <th>id</th>
            <th>userId</th>
            <th>title</th>
            <th hidden="true">completed</th>
            <th hidden="true">delete</th>
          </tr>
        </tfoot>


     </table>

   </div>


 </body>
</html>