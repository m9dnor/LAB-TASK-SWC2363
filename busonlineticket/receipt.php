<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style>
  form{

  background-color:white;
  width: 450px;
  height: 500px;
  }
  </style>
<body>
	<?php
	include ("headerbus.php");
include("db.php");

if(isset($_POST['scheid']) && isset($_POST['ticketamount']) && isset($_POST['totalprice']) && isset($_POST['fname'])  && isset($_POST['email']) && isset($_POST['phonenum'])){
	//SQL SELECT DATA
	$scheduleid = $_POST['scheid'];
  $ticketamount = $_POST['ticketamount'];
  $totalprice = $_POST['totalprice'];

  $fullname = $_POST['fname'];
  $email = $_POST['email'];
  $phonenum = $_POST['phonenum'];

	$querygetavailabilitybus = mysqli_query($conn, "SELECT `schedule`.`schedule_id`, `schedule`.`bus_id`, `schedule`.`route_id`, `schedule`.`date`, `schedule`.`time`, `schedule`.`fee`, `route`.`from`, `route`.`to`, `bus`.`bus_id`, `bus`.`name`, `bus`.`total_seat` FROM `schedule` INNER JOIN `route` ON `schedule`.`route_id` = `route`.`route_id` INNER JOIN `bus` ON `schedule`.`bus_id` = `bus`.`bus_id` WHERE `schedule`.`schedule_id` = '$scheduleid'");
	if(mysqli_num_rows($querygetavailabilitybus) > 0) {
		$busavailableresult = mysqli_fetch_array($querygetavailabilitybus);

    $resultpaymentdb = mysqli_query($conn, "INSERT INTO `user`(`order_id`, `User_Name`, `User_phone_num`, `User_email`, `schedule_id`, `ticket_amount`, `total_payment`) VALUES (NULL,'$fullname','$phonenum','$email','$scheduleid','$ticketamount','$totalprice')");
    if($resultpaymentdb){
      $id = mysqli_insert_id($conn);
      $seatnumber = "#".$id;
    }
	}
		?>
<center> <form><div class="col-25">
    <div class="container">
      <h4>Ticket Information</i></h4>
      <p>Bus Name:<a><?php echo $busavailableresult[9] ?></a></p>
      <p> Name:<a><?php echo $fullname ?></a></p>
      <p>From:<a><?php echo $busavailableresult[6]; ?></a> </p>
      <p>Destination:<a><?php echo $busavailableresult[7]; ?></a> </p>
      <p>Date:<a><?php echo $busavailableresult[3]; ?></a></p>
      <p>Time:<a><?php echo $busavailableresult[4]; ?></a></p>
      <p>Price per Ticket:<a><?php echo $busavailableresult[5]; ?></a></p>
      <p>Ticket Amount:<a><?php echo $ticketamount; ?></a></p>
      <p>Email:<a><?php echo $email ?></a></p>
      <p>Phone Number:<a><?php echo $phonenum ?></a></p>
      <p>SEAT NUMBER:<a><?php echo $seatnumber ?></a></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>RM<?php echo $totalprice ?></b></span></p>
      <button onclick="window.print()">Print</button>
    </div>
</form>
<?php
}
?>

</body>
</html>