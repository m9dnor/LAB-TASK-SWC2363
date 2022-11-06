<html>
<head>

</head>

<body>


<?php

$connect = mysqli_connect("localhost","root","","busonline_ticket");
 if (!$connect){
 	die ('ERROR:'.mysqli_connect_error());
 }
?>

<div class="topnav">
  <a class="active" href="adminhomepage.php">Home</a>
  <a href="route.php">Route</a>
  <a href="bus.php">Bus</a>
  <a href="schedule.php">Schedule</a>
  <a href="addadmin.php">Add Admin</a>
  <a href="searchuser.php">Search Customer</a>
  <a href="admin.php" class="split">Logout</a>
</div>


  <center><h2>ADMIN PAGE</h2></center>

</body>
</html>