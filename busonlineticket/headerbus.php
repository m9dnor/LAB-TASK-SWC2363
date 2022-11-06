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


    <a href="homepage.php">Home</a>
  <a href="services.php">Services</a>
  <a href="admin.php">Admin</a>


</body>
</html>