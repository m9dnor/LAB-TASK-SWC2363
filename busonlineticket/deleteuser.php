<?php
include('db.php');
if(isset($_GET['order_id'])){
	$order_id= $_GET['order_id'];
	$sql = "DELETE FROM `user` WHERE order_id = '$order_id'";

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Delete user successfull'); window.location='adminhomepage.php';</script>";
} else {
  echo "<script>alert('User delete failed'); window.location='adminhomepage.php';</script>";
}
}