<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 70%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
div{
width: 700px;
}
</style>
<body>
<?php
include ("headerbus.php");
include("db.php");

     if(isset($_GET['From_To_start']) && isset($_GET['From_To_dest']) && isset($_GET['OnwardDate']) && isset($_GET['totalticket']) && isset($_GET['total'])){
	//SQL SELECT DATA
	$from = $_GET['From_To_start'];
	$dest = $_GET['From_To_dest'];
	$onward = $_GET['OnwardDate'];
	$totalticket = $_GET['totalticket'];
	$totalprice = $_GET['total'];
	$querygetavailabilitybus = mysqli_query($conn, "SELECT `schedule`.`schedule_id`, `schedule`.`bus_id`, `schedule`.`route_id`, `schedule`.`date`, `schedule`.`time`, `schedule`.`fee`, `route`.`from`, `route`.`to`, `bus`.`bus_id`, `bus`.`name`, `bus`.`total_seat` FROM `schedule` INNER JOIN `route` ON `schedule`.`route_id` = `route`.`route_id` INNER JOIN `bus` ON `schedule`.`bus_id` = `bus`.`bus_id` WHERE `schedule`.`date` LIKE '$onward' AND `route`.`from` LIKE '$from' AND `route`.`to` LIKE '$dest'");
	if(mysqli_num_rows($querygetavailabilitybus) > 0) {
		$busavailableresult = mysqli_fetch_array($querygetavailabilitybus);
		?>


 <center> <div class="col-25">
    <div class="container">
      <h4>Ticket Information</i></h4>
      <p>Bus Name:<a><?php echo $busavailableresult[9] ?></a></p>
      <p>From:<a><?php echo $busavailableresult[6]; ?></a> </p>
      <p>Destination:<a><?php echo $busavailableresult[7]; ?></a> </p>
      <p>Date:<a><?php echo $busavailableresult[3]; ?></a></p>
      <p>Time:<a><?php echo $busavailableresult[4]; ?></a></p>
      <p>Price per Ticket:<a><?php echo $busavailableresult[5]; ?></a></p>
      <p>Ticket Amount:<a><?php echo $totalticket; ?></a></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>RM<?php echo $totalprice ?></b></span></p>
    </div>
  </div><br><br><br>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="receipt.php" method="POST">
      	<input type="hidden" name="scheid" value="<?php echo $busavailableresult[0]; ?>">
      	<input type="hidden" name="ticketamount" value="<?php echo $totalticket; ?>">
      	<input type="hidden" name="totalprice" value="<?php echo $totalprice; ?>">
      
        <div class="row">
          <div class="col-50">
            <h3>Booking Information</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="fname" placeholder="Your Name" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="abc@abs.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i>Phone Number</label>
            <input type="text" name="phonenum" placeholder="012345678910" required>

          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label><br>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Your Name" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2022" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" value="Pay" class="btn">
      </form>
    </div>
  </div>
</div>
</center>
</body>
</html>
<?php		
}
}
?>