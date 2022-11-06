
<?php
 include ("headeradmin.php");
  include('db.php');
if(isset($_POST['admin_id']) && isset($_POST['Password'])){
  //SQL SELECT DATA
  $admin_id= $_POST['admin_id'];
  $Password=$_POST['Password'];

$sql = "INSERT INTO `admin`(`admin_id`, `Password`) VALUES ('$admin_id','$Password')";

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
	<p>ADMIN LIST</p>
<table border='2'>
  <tr>
    <th>Admin Id</th>
  </tr>
  <?php
  $queryget = mysqli_query($conn, "SELECT `admin_id` FROM admin");
  while($data = mysqli_fetch_array($queryget)){
  ?>
   <tr>
    <td><?php echo $data[0] ?></td>
  </tr>
  <?php } ?>
</table>
<br><br>
<p> ADD NEW ADMIN</p>
<form action="addadmin.php" method="post">
  <input type="text" id="lname" name="admin_id" placeholder="Admin Id"><br><br>
  <input type="password" id="lname" name="Password" placeholder="Password"><br><br>
   <input type="submit" value="Submit">
</form> 
</center>
</body>
</html>