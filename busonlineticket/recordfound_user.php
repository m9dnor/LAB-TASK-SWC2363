<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include ("headeradmin.php");
  include('db.php'); ?>

    <h2> search result </h2>

    <?php

    $in = $_POST ['User_Name'];
    $in = mysqli_real_escape_string($connect, $in);

    $q = "SELECT order_id, User_Name, User_phone_num, User_email, schedule_id, ticket_amount, total_payment FROM user WHERE User_Name = '$in' ORDER BY order_id";

    $result = @mysqli_query ($connect, $q);

    if($result) {
        echo '<table border="2">
        <tr><td><b>ID</b></td>
        <td><b>Name</b></td>
        <td><b> Phone Number</b></td>
        <td><b> Email</b></td>
        <td><b> Schedule ID</b></td>
        <td><b> Ticket Amount</b></td>
        <td><b> Total Payment</b></td>
        <tr>';

        while ($row =  mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<tr>
            <td>' .$row['order_id']. '</td>
            <td>' .$row['User_Name']. '</td>
            <td>' .$row['User_phone_num']. '</td>
            <td>' .$row['User_email']. '</td>
            <td>' .$row['schedule_id']. '</td>
            <td>' .$row['ticket_amount']. '</td>
            <td>' .$row['total_payment']. '</td>
            </tr>';
        }

        echo '</table';
        mysqli_free_result ($result);
    } else {
        echo '<p class="error"> If no record is shown, this is because you had an incorrect or missing entry in search form.<br> Click the back button on the browser and try again.</p>';
        echo '<p>'. mysqli_error($connect). '<br<<br/>Query:'. $q. '</p>';
    }
    mysqli_close ($connect);
    ?>
</body>
</html>