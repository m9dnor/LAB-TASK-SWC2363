<html>
<head>
    <?php
include ("headerbus.php");
include("db.php");
?>
</head>

<body>
    
    <center>
<h2> BUS ONLINE TICKET SYSTEM</h2>
</center>


<form action="ticketsearch.php" method="post">
 
 <label for="From_To">From </label>
    <select id="From_To" name="From_To_start" required >
         <option value=""selected disabled>Your Place</option>
      <option value="johor">Johor</option>
      <option value="kedah">Kedah</option>
      <option value="kelantan">Kelantan</option>
      <option value="melaka">Melaka</option>
      <option value="negeri sembilan">Negeri Sembilan</option>
      <option value="pahang">Pahang</option>
      <option value="perak">Perak</option>
      <option value="perlis">Perlis</option>
      <option value="pulau pinang">Pulau Pinang</option>
      <option value="selangor">Selangor</option>
      <option value="terengganu">Terengganu</option>
      <option value="Kuala Lumpur">Kuala Lumpur</option>
    </select>

     <hr>
    <label for="From_To">To </label>
    <select id="From_To" name="From_To_dest" required>
        <option value="" selected disabled>Your Destination</option>
      <option value="johor">Johor</option>
      <option value="kedah">Kedah</option>
      <option value="kelantan">Kelantan</option>
      <option value="melaka">Melaka</option>
      <option value="negeri sembilan">Negeri Sembilan</option>
      <option value="pahang">Pahang</option>
      <option value="perak">Perak</option>
      <option value="perlis">Perlis</option>
      <option value="pulau pinang">Pulau Pinang</option>
      <option value="selangor">Selangor</option>
      <option value="terengganu">Terengganu</option>
      <option value="Kuala Lumpur">Kuala Lumpur</option>
    </select>
  <hr>

  <div class="elem-group inlined">
    <label for="Date">Departure Date</label>
    <input type="Date" id="Onward-date" name="OnwardDate" required>
  </div>
  </div><br><br><br><br><br><br><br><br><br>
 <center> <button type="submit" style="float:center;">FIND</button></center>
</form>




<script>
    var currentDateTime = new Date();
var year = currentDateTime.getFullYear();
var month = (currentDateTime.getMonth() + 1);
var date = (currentDateTime.getDate() + 1);

if(date < 10) {
  date = '0' + date;
}
if(month < 10) {
  month = '0' + month;
}

var dateTomorrow = year + "-" + month + "-" + date;
var checkinElem = document.querySelector("#Onward-date");
var checkoutElem = document.querySelector("#Return-date");

checkinElem.setAttribute("min", dateTomorrow);

checkinElem.onchange = function () {
    checkoutElem.setAttribute("min", this.value);
}
</script>

</body>
</html>