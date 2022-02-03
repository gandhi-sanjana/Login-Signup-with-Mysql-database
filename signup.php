<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted

    $name = $_POST['name'];
		$email = $_POST['email'];
    $phone = $_POST['phone'];
    $password= $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if(!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($cpassword))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (name,email,phone,password,cpassword,user_id) values ('$name','$email','$phone','$password','$cpassword', '$user_id')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="login.css">
<title> SignUP </title>
</head>
<body>
  <body>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>SignUP</h3>
            <p>Please enter your credentials to SignUP.</p>
          </div>
        </div>
        <form class="login-form" method="post">
          
          <input type="text" placeholder="Name" name="name"/>
          <input type="email" placeholder="Email ID" name="email"/>
          <input type="tel" placeholder="Phone No." id="phone" name="phone">
          <input type="password" placeholder="Password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <input type="password" placeholder="Confirm Password" id="cpsw" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <button type="Submit">SignUP</button>
          <p class="message">Already registered? <a href="login.php">Login Here</a></p>
        </form>
      </div>
    </div>
</body>
</body>
</html>