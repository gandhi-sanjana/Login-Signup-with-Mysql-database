<?php 
session_start(); 
include_once('connection.php'); 
if(isset($_SESSION['user_id'])) 
 { 
  $id = $_SESSION['user_id']; 
  $query = "select * from users where user_id = '$id' "; 
 } 
 
$result=mysqli_query($con, $query); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

<h3 align="centre">User Details</h3> 

<?php  
 $rows=mysqli_fetch_assoc($result) 
?> 
Name : <?php echo $rows['email']; ?> <br> 
Phone Number : <?php echo $rows['phone']; ?> <br> 
Email : <?php echo $rows['email']; ?><br><br>
</body>
</html>