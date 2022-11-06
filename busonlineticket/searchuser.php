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
  include('db.php');?>

    <form action = "recordfound_user.php" method="post">

    <h1> SEARCH CUSTOMER RECORD</h1>
    <p><label class = "label" for= "User_Name">Customer's Full Name: </label>
    <input id ="User_Name" type="text" name ="User_Name" size="30" maxlength="30"
    value="<?php if (isset($_POST['User_Name'])) echo $_POST ['User_Name']; ?>" /></p>

    <p><input id ="submit" type="submit" name="submit" value="search" /></p>
</form>
</body>
</html>