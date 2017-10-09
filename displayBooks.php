<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Add Book</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
         /* Remove the navbar's default margin-bottom and rounded borders */ 
         .navbar {
         margin-bottom: 0;
         border-radius: 0;
         }
         /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
         .row.content {height: 450px}
         /* Set gray background color and 100% height */
         .sidenav {
         padding-top: 20px;
         background-color: #f1f1f1;
         height: 100%;
         }
         /* Set black background color, white text and some padding */
         footer {
         background-color: #555;
         color: white;
         padding: 15px;
         }
         /* On small screens, set height to 'auto' for sidenav and grid */
         @media screen and (max-width: 767px) {
         .sidenav {
         height: auto;
         padding: 15px;
         }
         .row.content {height:auto;} 
         }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>                        
               </button>
               <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Projects</a></li>
                  <li><a href="#">Contact</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container-fluid text-center">
         <div class="row content">
            <div class="col-sm-2 sidenav">
               <p><a href="#">Link</a></p>
               <p><a href="#">Link</a></p>
               <p><a href="#">Link</a></p>
            </div>
            <div class="col-sm-8 text-left">
               <h1>Display Book</h1>
               <?php
               $servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
               $search = $_REQUEST["search"];
               $sql = "select books.isbn,books.title,author.name, author.age from books inner join author on books.author_id = author.id where books.title like '%$search%'";
               $result = $conn->query($sql);
               echo $result->num_rows;
               if($result->num_rows > 0)
               {
               ?>
               <table border="2" align="center" cellpadding="10" cellspacing="10">
                  <tr>
                     <th> ISBN </th>
                     <th> Title </th>
                     <th> Author </th>
                  </tr>
                  <?php while($row = $result->fetch_assoc())
                     {
                     ?>
                  <tr>
                     <td><?php echo $row["isbn"];?> </td>
                     <td><?php echo $row["title"];?> </td>
                     <td><?php echo $row["name"];?> </td>
                     <td>
    <button id="edit_<?php echo $id ?>">Edit</button>
    <button id="delete_<?php echo $id ?>">Delete</button>
</td>
                  </tr>
                  <?php
                     }
                     }
                     else
                     echo "<center>No books found in the library by the name $search </center>" ;
                     ?>
               </table>
               <hr>
            </div>
         </div>
      </div>
      </div>
      <footer class="container-fluid text-center">
         <p>Library Management System</p>
      </footer>
   </body>
</html>