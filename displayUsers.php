<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Display Users</title>
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
         .row.content {height: 600px}
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
               <a class="navbar-brand" href="index.php"><img src="images.png" alt="HTML5 Icon" width="48" height="36"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li><a href="addBook.php">Add Book</a></li>
                  <li><a href=searchBooks.php>Search Book</a></li>
                  <li><a href="requestBook.php">Request Book</a></li>
                  <li><a href="returnBook.php">Return Book</a></li>
                  <li><a href="addUser.php">Add User</a></li>
                  <li><a href="searchUser.php">Search User</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container-fluid text-center">
         <div class="row content">
            <div class="col-sm-2 sidenav">
            </div>
            <div class="col-sm-8 text-left">
               <h1>Display users</h1>
               <?php
                  include("dbconnection.php");
                  $search = $_REQUEST["search"];
                  $sql = "select id, name, phone, email from users where name like '%$search%'";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0)
                  {
                  ?>
               <table border="2" align="center" cellpadding="10" cellspacing="10">
                  <tr>
                     <th> ID </th>
                     <th> Name </th>
                     <th> Phone </th>
                     <th> Email </th>
                  </tr>
                  <?php while($row = $result->fetch_assoc())
                     {
                     ?>
                  <tr>
                     <td><?php echo $row["id"];?> </td>
                     <td><?php echo $row["name"];?> </td>
                     <td><?php echo $row["phone"];?> </td>
                     <td><?php echo $row["email"];?> </td>
                  </tr>
                  <?php
                     }
                     }
                     else
                     echo "<center>No User found in the library matching the name $search </center>" ;
                     ?>
               </table>
            </div>
            <div class="col-sm-2 sidenav">
            </div>
         </div>
      </div>
      <footer class="container-fluid text-center">
         <p>Library Management System</p>
      </footer>
   </body>
</html>