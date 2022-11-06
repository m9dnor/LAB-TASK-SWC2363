<?php
 include ("headeradmin.php");
  include('db.php');
   if(isset($_POST['schedule_id']) && isset($_POST['bus_id']) && isset($_POST['route_id']) && isset($_POST['date'])&& isset($_POST['time'])&& isset($_POST['fee'])){
  
  //SQL SELECT DATA
    $schedule_id= $_POST['schedule_id'];
    $bus_id= $_POST['bus_id'];
  $route_id= $_POST['route_id'];
  $date=$_POST['date'];
  $time=$_POST['time'];
   $fee=$_POST['fee'];

$sql = "INSERT INTO `schedule`(`schedule_id`, `bus_id`, `route_id`, `date`, `time`, `fee`) VALUES ('$schedule_id','$bus_id',
  '$route_id','$date','$time','$fee')";

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
	<p>SCHEDULE</p>
<table border='2'  style="text-align: left;">
  <tr>
    <th>Schedule Id</th>
    <th>Bus Id</th>
     <th>Route Id</th>
     <th>Date</th>
     <th>Time</th>
     <th>Fee</th>
  </tr>
  <?php
  $queryget = mysqli_query($conn, "SELECT `schedule`.`schedule_id`, `schedule`.`bus_id`, `schedule`.`route_id`, `schedule`.`date`, `schedule`.`time`,`schedule`. `fee`,`route`.`from`, `route`.`to`,`bus`.`name` FROM `schedule` INNER JOIN `route` ON `route`.`route_id`=`schedule`.`route_id` INNER JOIN `bus` ON `schedule`.`bus_id` = `bus`.`bus_id`");
  while($data = mysqli_fetch_array($queryget)){
  ?>
   <tr>
    <td><?php echo $data[0] ?></td>
    <td><?php echo $data[1] ?>) <?php echo $data[8] ?></td>
     <td><?php echo $data[2] ?>)  <?php echo $data[6] ?> →  <?php echo $data[7] ?></td>
     <td><?php echo $data[3] ?></td>
     <td><?php echo $data[4] ?></td>
     <td><?php echo $data[5] ?></td>
     <td><a href="editschedule.php?schedule_id=<?php echo $data[0] ?>">Edit</a></td>
     <td><a href="deleteschedule.php?schedule_id=<?php echo $data[0] ?>" onclick="return confirm('Are you sure want to delete this schedule?')">Delete</a></td>
  </tr>
  <?php } ?>
</table>
<br><br>
<p> ADD SCHEDULE</p>
<form action="schedule.php" method="post">
  <input type="number" id="lname" name="schedule_id" placeholder= "Schedule ID"><br><br>
  <input type="number" id="lname" name="bus_id" placeholder= "Bus ID">
  <input type="number" id="lname" name="route_id" placeholder= "Route ID"><br><br>
  <label for="date">Departure Date : </label>
  <input type="Date" id="date" name="date" ><br><br>
  <label for="time">Departure Time : </label>
  <input type="time" id="time" name="time" ><br><br>
 <input type="number" id="lname" name="fee" placeholder= "Fee"><br>
 <br>
   <input type="submit" value="Submit">
</form> 
</center>
</body>
</html>