<?php
 include ("headeradmin.php");
  include('db.php');

  if(isset($_POST['route_id']) && isset($_POST['from']) && isset($_POST['to'])){
  //SQL SELECT DATA
  $route_id= $_POST['route_id'];
  $from=$_POST['from'];
  $to=$_POST['to'];

$sql = "INSERT INTO `route`(`route_id`, `from`, `to`) VALUES ('$route_id','$from','$to')";

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
	<h1>ROUTE</h1>
<table border='2'>
  <tr>
    <th>Route Id</th>
    <th>From</th>
    <th>To</th>
  </tr>
  <?php
  $queryget = mysqli_query($conn, "SELECT `route_id`, `from`, `to` FROM `route` ");
  while($data = mysqli_fetch_array($queryget)){
  ?>
   <tr>
    <td><?php echo $data[0] ?></td>
    <td><?php echo $data[1] ?></td>
    <td><?php echo $data[2] ?></td>
  </tr>
  <?php } ?>
</table>
<br>
<p> ADD NEW ROUTE</p>
<form action="route.php" method="post">

<label for="routeid">Route ID : </label>
	<input class="number" type="number" value="1" name="route_id" id="routeid" required><br><br>
    <select id="from" name="from" required >
         <option value=""selected disabled>Departure Destination</option>
      <option value="JOHOR">JOHOR</option>
      <option value="KEDAH">KEDAH</option>
      <option value="KELANTAN">KELANTAN</option>
      <option value="MELAKA">MELAKA</option>
      <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
      <option value="PAHANG">PAHANG</option>
      <option value="PERAK">PERAK</option>
      <option value="PERLIS">PERLIS</option>
      <option value="PULAU PINANG">PULAU PINANG</option>
      <option value="SELANGOR">SELANGOR</option>
      <option value="TERENGGANU">TERENGGANU</option>
      <option value="KUALA LUMPUR">KUALA LUMPUR</option>
    </select>
<br><br>
    <select id="to" name="to" required >
         <option value=""selected disabled>Arrival Destination</option>
      <option value="JOHOR">JOHOR</option>
      <option value="KEDAH">KEDAH</option>
      <option value="KELANTAN">KELANTAN</option>
      <option value="MELAKA">MELAKA</option>
      <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
      <option value="PAHANG">PAHANG</option>
      <option value="PERAK">PERAK</option>
      <option value="PERLIS">PERLIS</option>
      <option value="PULAU PINANG">PULAU PINANG</option>
      <option value="SELANGOR">SELANGOR</option>
      <option value="TERENGGANU">TERENGGANU</option>
      <option value="KUALA LUMPUR">KUALA LUMPUR</option>
    </select>
<hr>
   
  <hr><br>
   <input type="submit" value="Submit">
</form> 
</center>

</body>
</html>