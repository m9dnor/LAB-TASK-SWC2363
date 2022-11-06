<?php
include('db.php');
if(isset($_GET['schedule_id'])){
	$schedule_id= $_GET['schedule_id'];
	$sql = "DELETE FROM `schedule` WHERE schedule_id = '$schedule_id'";

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Delete schedule successfully'); window.location='schedule.php';</script>";
} else {
  echo "<script>alert('Schedule delete failed'); window.location='schedule.php';</script>";
}
}