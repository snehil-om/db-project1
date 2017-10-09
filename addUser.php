<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add User</title>
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
        <li><a href="#">Add Book</a></li>
        <li><a href=search.php>Search Book</a></li>
        <li><a href="#">Request Book</a></li>
        <li class="active"><a href="#">Add User</a></li>
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
      <h1>Add Book</h1>
      <p>
        <form action="saveUser.php" method="post">
 
<table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<td> Enter User Name :</td>
<td> <input type="text" name="name" size="48" required> </td>
</tr>
<tr>
<td> Enter Phone number :</td>
<td> <input type="number" name="phone" size="48"> </td>
</tr>
<tr>
<td> Enter Email address :</td>
<td> <input type="text" name="email" size="48"> </td>
</tr>
<tr>
<td> Enter City :</td>
<td> <input type="text" name="city" size="48" > </td>
</tr>
<tr>
<td> Enter Zip Code :</td>
<td> <input type="number" name="zip" size="48" > </td>
</tr>
<tr>
<td> Enter State :</td>
<td> <input type="text" name="state" size="48" > </td>
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
