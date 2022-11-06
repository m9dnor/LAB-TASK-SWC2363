<?php
 include ("headeradmin.php");
  include('db.php');
if(isset($_POST['name']) && isset($_POST['total_seat'])){
  //SQL SELECT DATA
  $name= $_POST['name'];
  $totseat=$_POST['total_seat'];

$sql = "INSERT INTO `bus`(`bus_id`, `name`, `total_seat`) VALUES (NULL,'$name','$totseat')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>

<body>
	<center>
	<h1>BUS</h1>
<table border='2'>
  <tr>
    <th>Bus Id</th>
    <th>Name</th>
     <th>Total Seat</th>
  </tr>
  <?php
  $queryget = mysqli_query($conn, "SELECT `bus_id`, `name`,`total_seat` FROM `bus`");
  while($data = mysqli_fetch_array($queryget)){
  ?>
   <tr>
    <td><?php echo $data[0] ?></td>
    <td><?php echo $data[1] ?></td>
     <td><?php echo $data[2] ?></td>
  </tr>
  <?php } ?>
</table>
<br><br>
<p> ADD NEW BUS</p>
<form action="bus.php" method="post">
  <input type="text" id="lname" name="name" value="Bus Name"><br><br>
  <label for="totalseat">Total Seats Available :</label>
  <input class="number" type="number" min="30"  max="60" value="60" name="total_seat" id="totalseat" required><br><br>
   <input type="submit" value="Submit">
</form> 
</center>

</body>
</html>