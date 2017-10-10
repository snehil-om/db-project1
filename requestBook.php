<!DOCTYPE html>
<html lang="en">
<head>
  <title>Request Book</title>
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
            <a class="navbar-brand" href="#"><img src="images.png" alt="HTML5 Icon" width="48" height="36"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="addBook.php">Add Book</a></li>
        <li><a href=searchBooks.php>Search Book</a></li>
        <li class="active"><a href="requestBook.php">Request Book</a></li>
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
      <h1>Request Book</h1>

<br>
<form id="form1" name="form1" method="post" action="">
<center>Enter the book ISBN :
<input type="text" name="isbn" size="48" required>
<br></br>
Enter your user ID :
<input type="number" name="userId" size="48" required>
<br></br>
Enter starting date :
<input type="date" name="date" size="48" value = "2017-10-10">
<br></br>
Enter ending date :
<input type="date" name="date2" size="48" value = "2017-11-10">
<br></br>
<input type="submit" value="submit">
<input type="reset" value="Reset">
</center>
<br>
</form>
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
               $userId = $_POST["userId"];
               $isbn = $_POST["isbn"];
               $date = $_POST["date"];
               $date2 = $_POST["date2"];
               $sql = "select id from users where id = $userId";
               $result = $conn->query($sql);
                              $sql2 = "select isbn from books where isbn = $isbn";
               $result2 = $conn->query($sql2);
               if($result->num_rows == 0 || $result2->num_rows == 0)
                     echo "<center>UserId or ISBN entered is incorrect </center>" ;
                else{
                  $sql = "select quantity from books where isbn = $isbn";
               $result = $conn->query($sql);
               $row = $result->fetch_assoc();
               $q = $row[quantity]-1;
               if($q<0){
                 echo "Requested book not available right now!";
               }
              else{
                  $sql = "update books set quantity = $q where isbn = $isbn";
                  $result = $conn->query($sql);
                  $sql3 = "insert into user_request (user_id, isbn, from_date, to_date) values ('$userId','$isbn','$date','$date2')";
                  if ($conn->query($sql3) === TRUE) {
    echo "New Request created succesfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
                }
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