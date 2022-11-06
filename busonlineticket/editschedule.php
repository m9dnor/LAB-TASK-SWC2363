<?php
 include ("headeradmin.php");
  include('db.php');
   if(isset($_POST['currentscheduleid']) && isset($_POST['bus_id']) && isset($_POST['route_id']) && isset($_POST['date'])&& isset($_POST['time'])&& isset($_POST['fee'])){
  
  //SQL SELECT DATA
    $schedule_id= $_POST['currentscheduleid'];
    $bus_id= $_POST['bus_id'];
  $route_id= $_POST['route_id'];
  $date=$_POST['date'];
  $time=$_POST['time'];
   $fee=$_POST['fee'];

$sql = "UPDATE `schedule` SET `bus_id`='$bus_id',`route_id`='$route_id',`date`='$date',`time`=
'$time',`fee`='$fee' WHERE schedule_id = '$schedule_id'";

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Update schedule successfully'); window.location='schedule.php';</script>";
} else {
  echo "<script>alert('Schedule update failed'); window.location='schedule.php';</script>";
}

}
if(isset($_GET['schedule_id'])){
	$schedule_id=$_GET['schedule_id'];
	$sql="SELECT `schedule_id`, `bus_id`, `route_id`, `date`, `time`, `fee` FROM `schedule` WHERE schedule_id='$schedule_id'";
	$result = mysqli_query($conn, $sql);
	$getdataschedule = mysqli_fetch_array($result);	
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
<p> EDIT SCHEDULE</p>
<form action="editschedule.php" method="post"><br>
	<br><label>Schedule Id</label><br>
	<input type="hidden" name="currentscheduleid" value="<?php echo $_GET['schedule_id']; ?>">
  <input type="number" id="lname" value="<?php echo $getdataschedule[1] ?>" name="bus_id">
  <br><label>Route Id</label><br>
  <input type="number" id="lname" value="<?php echo $getdataschedule[2] ?>" name="route_id">
  <br><label>Date</label><br>
  <input type="Date" id="lname" value="<?php echo $getdataschedule[3] ?>" name="date" >
  <br><label>Time</label><br>
  <input type="time" id="lname" value="<?php echo $getdataschedule[4] ?>" name="time" >
 <br><label>Fee</label><br>
 <input type="number" id="lname" value="<?php echo $getdataschedule[5] ?>" name="fee">
 <br>
   <input type="submit" value="Submit">
</form>
</center> 
</body>
</html>