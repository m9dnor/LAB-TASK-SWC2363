<?php
 include ("headeradmin.php");
  include('db.php');
  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
</head>
<body>
<center>
	<h1>CUSTOMER ORDER DETAILS</h1>
<table border='2'>
  <tr>
    <th>Order Id</th>
    <th>Name</th>
    <th>Phone Num</th>
    <th>Email</th>
    <th>Schedule id</th>
    <th>Ticket Amount</th>
    <th>Total</th>
  </tr>
  <?php
  $queryget = mysqli_query($conn, "SELECT `order_id`, `User_Name`, `User_phone_num`, `User_email`, `schedule_id`, `ticket_amount`, `total_payment` FROM `user` ");
  while($data = mysqli_fetch_array($queryget)){
  ?>
   <tr>
    <td><?php echo $data[0] ?></td>
    <td><?php echo $data[1] ?></td>
    <td><?php echo $data[2] ?></td>
    <td><?php echo $data[3] ?></td>
    <td><?php echo $data[4] ?></td>
    <td><?php echo $data[5] ?></td>
    <td><?php echo $data[6] ?></td>
    <td><a href="deleteuser.php?order_id=<?php echo $data[0] ?>" onclick="return confirm('Are you sure want to delete this customer?')">Delete</a></td>
  </tr>
  <?php } ?>
</table>
</center>
</body>
</html>