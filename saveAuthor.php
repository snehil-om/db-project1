<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Save Book</title>
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
               <h1>Save Book</h1>
               <p>
                  <?php
                     include("dbconnection.php");
                     $name=$_POST["name"];
                     $age=$_POST["age"];
                     $title=$_POST["title"];
                     $isbn=$_POST["isbn"];
                     $sql1 = "INSERT INTO author (name, age) VALUES ('$name', '$age')";
                     if ($conn->query($sql1) === TRUE) {
                         $id = mysqli_insert_id($conn);
                     $sql2 = "INSERT INTO books (title, isbn, author_id) VALUES ('$title', '$isbn', '$id')";
                     if ($conn->query($sql2) === TRUE) {
                         echo "New record created successfully";
                     } else {
                         echo "Error: " . $sql . "<br>" . $conn->error;
                     }
                     } else {
                         echo "Error: " . $sql . "<br>" . $conn->error;
                     }
                     
                     $conn->close();
                     ?>
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