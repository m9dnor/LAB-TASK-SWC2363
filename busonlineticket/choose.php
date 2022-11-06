<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>

<body>
<?php
include ("headerbus.php");
include("db.php");

if(isset($_GET['From_To_start']) && isset($_GET['From_To_dest']) && isset($_GET['OnwardDate'])){
	//SQL SELECT DATA
	$from = $_GET['From_To_start'];
	$dest = $_GET['From_To_dest'];
	$onward = $_GET['OnwardDate'];

	$querygetavailabilitybus = mysqli_query($conn, "SELECT `schedule`.`schedule_id`, `schedule`.`bus_id`, `schedule`.`route_id`, `schedule`.`date`, `schedule`.`time`, `schedule`.`fee`, `route`.`from`, `route`.`to`, `bus`.`bus_id`, `bus`.`name`, `bus`.`total_seat` FROM `schedule` INNER JOIN `route` ON `schedule`.`route_id` = `route`.`route_id` INNER JOIN `bus` ON `schedule`.`bus_id` = `bus`.`bus_id` WHERE `schedule`.`date` LIKE '$onward' AND `route`.`from` LIKE '$from' AND `route`.`to` LIKE '$dest'");
	if(mysqli_num_rows($querygetavailabilitybus) > 0) {
		$busavailableresult = mysqli_fetch_array($querygetavailabilitybus);
		?>

		<br>
		<form action="payment.php" method="post">
		<div class="buslist">
			<table><tr>
			<h3><?php echo $busavailableresult[9] ?></h3>
			FROM: <?php echo $busavailableresult[6]; ?> <br>
			TO: <?php echo $busavailableresult[7]; ?> <br>
			DATE: <?php echo $busavailableresult[3]; ?> <br>
			TIME: <?php echo $busavailableresult[4]; ?> <br>
			 FEE: RM<?php echo  $busavailableresult[5]; ?> <input class="number" type="number" onchange="calculateprice(this.value)" oninput="calculateprice(this.value)" min="1" value="1" id="numbeript" required><br><br>
			 <div id="totalpriceoutput">TOTAL:RM <?php echo $busavailableresult[5]; ?></div>
			 <p>Please Choose Amount Of Ticket</p>
			<button type="button" onclick="gotopayment('<?php echo $from ?>','<?php echo $dest ?>','<?php echo $onward ?>')" style="float:center; font-size: 25px;">Payment</button>
		</td>
		</table>
		</div>
	</form>
<?php		
}
}
?>
<script type="text/javascript">
	var TICKETAMOUNT = 1;
		var TOTALPRICE = <?php echo $busavailableresult[5]; ?>;
	function calculateprice(seatnumber) {
		var fee = <?php echo $busavailableresult[5]; ?>;
		var result = seatnumber * fee;
		//SET GLOBAL TICKET AND PRICE
		TICKETAMOUNT = seatnumber;
		TOTALPRICE = result;
		document.getElementById("totalpriceoutput").innerHTML = 'TOTAL:RM ' + parseFloat(result).toFixed(2);
	}

		function gotopayment(fromstart,fromdest,odate) {
          window.location= "payment.php?From_To_start="+ fromstart+ "&From_To_dest="+ fromdest + "&OnwardDate="+ odate + "&totalticket=" + TICKETAMOUNT + "&total=" + TOTALPRICE;
		}
</script>
</body>
</html>