<!DOCTYPE html>
<html>
<head>
</head>
<body>

  <?php
 include ("headerbus.php");
  include('db.php');
  if(isset($_POST['admin_id']) && isset($_POST['Password'])){
  //SQL SELECT DATA
  $admin_id = $_POST['admin_id'];
  $Password= $_POST['Password'];

  $querygetadmin = mysqli_query($conn,"SELECT `admin_id`, `Password` FROM `admin` WHERE 
    `admin_id`='$admin_id' AND `password` = '$Password'");
    $numrows=mysqli_num_rows($querygetadmin);

     if($numrows>0)  
    {  
    while($row=mysqli_fetch_assoc($querygetadmin))  
    {  
    $dbusername=$row['admin_id'];  
    $dbpassword=$row['Password'];  
    }  

     if($admin_id == $dbusername && $Password == 
      $dbpassword)  
    {  
    session_start();  
    $_SESSION['sess_user']=$user;  

     header("Location: adminhomepage.php");  
    }  
    } else {  
    echo "<h2 style='text-align:center; color:white;'>Invalid username or password!</h2>";  
    }  
  
} 
  ?>
	<form action="" method="post">

      <div class="col">
        <div class="hide-md-lg">
        	<br><br><br><br><br><br><br><br><br><br>
         <center> <p>ADMIN LOGIN:</p></center>
        </div>
        <br><br><br>
        <center><input type="text" name="admin_id" placeholder="Username" required><br><br>
        <input type="password" name="Password" placeholder="Password" required><br><br>
        <input type="submit" value="Login"></center>
      </div>
      
    </div>
</div>
</form>
</body>
</html>