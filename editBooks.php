<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Books</title>
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
    <div class="navbar-header" height = "64">
      <a class="navbar-brand" href="#"><img src="images.png" alt="HTML5 Icon" width="48" height="36"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" height = "64" padding = "25px">
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

    
    <h1>Edit Books</h1>

        <form action="saveBook.php" method="post">
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
               $id = $_GET["id"];
               $sql = "select books.isbn, books.title, books.author_id, author.name, author.age from books inner join author on books.author_id = author.id where books.isbn = '$id'";
               $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $title=$row[title];
            
               ?>
<table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<td> Enter Book :</td>
<td> <input readonly="readonly" name="title" size="48" value = "<?php echo $title?>"> </td>
</tr>
<tr>
<td> Enter ISBN :</td>
<td> <input readonly="readonly" name="isbn" size="48" value = "<?php echo $row[isbn]?>"> </td>
</tr>
<tr>
<td> Enter Author's Name :</td>
<td> <input readonly="readonly" name="name" size="48" value = "<?php echo $row[name]?>"> </td>
</tr>
<tr>
<td> Enter Author's Age :</td>
<td> <input type="number" name="age" size="48" value = "<?php echo $row[age]?>"> </td>
</tr>
<tr>
<td> <input type="hidden" name="id" value = "<?php echo $row[author_id]?>"> </td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" value="submit">
<input type="reset" value="Reset">
</td>
</tr>
</table>
</form>
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