<!DOCTYPE html>
<html>
<head>
	<script>
		function gotochoose(fromstart,fromdest,odate) {
          window.location= "choose.php?From_To_start="+ fromstart+ "&From_To_dest="+ fromdest + "&OnwardDate="+ odate;
		}
	</script>
</head>
<body>
	
	<?php
	include ("headerbus.php");
include("db.php");

if(isset($_POST['From_To_start']) && isset($_POST['From_To_dest']) && isset($_POST['OnwardDate'])){
	//SQL SELECT DATA
	$from = $_POST['From_To_start'];
	$dest = $_POST['From_To_dest'];
	$onward = $_POST['OnwardDate'];

	$querygetavailabilitybus = mysqli_query($conn, "SELECT `schedule`.`schedule_id`, `schedule`.`bus_id`, `schedule`.`route_id`, `schedule`.`date`, `schedule`.`time`, `schedule`.`fee`, `route`.`from`, `route`.`to`, `bus`.`bus_id`, `bus`.`name`, `bus`.`total_seat` FROM `schedule` INNER JOIN `route` ON `schedule`.`route_id` = `route`.`route_id` INNER JOIN `bus` ON `schedule`.`bus_id` = `bus`.`bus_id` WHERE `schedule`.`date` LIKE '$onward' AND `route`.`from` LIKE '$from' AND `route`.`to` LIKE '$dest'");
	if(mysqli_num_rows($querygetavailabilitybus) > 0) {
		$busavailableresult = mysqli_fetch_array($querygetavailabilitybus);
		?>
		<form action="choose.php" method="post">
		<div class="buslist">
			<h3><?php echo $busavailableresult[9] ?></h3>
			FROM: <?php echo $busavailableresult[6]; ?> <br>
			TO: <?php echo $busavailableresult[7]; ?> <br>
			DATE: <?php echo $busavailableresult[3]; ?> <br>
			TIME: <?php echo $busavailableresult[4]; ?> <br>
			 FEE: RM<?php echo  $busavailableresult[5]; ?><br><br>
			
			<button type="button" onclick="gotochoose('<?php echo $from ?>','<?php echo $dest ?>','<?php echo $onward ?>')">PROCEED</button></center>
		</div>
	</form>
		
      
		<?php 
	}

	
}
?>
 
</center>

</body>
</html>