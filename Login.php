<?php
include 'dbinfo.php'; 
?>  

<html>
<head>
<style>

body{
	background-image: url('../src/bg.jpg');
	background-repeat: no-repeat;
}
div.login{
	margin-top: 100px;
	background-color-opacity: 0.5;
}
h1{
	color: white;
}
.btn{
	background-color: crimson;
	border-radius: 20px;
	color: white;
}
.label{
	color: cornsilk;
}
.input{
	border-radius: 10px;
}



</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<?php
//always start the session before anything else!!!!!! 
session_start(); 

if(isset($_POST['username']) and isset($_POST['password']))  { //check null
	$username = $_POST['username']; // text field for username 
	$password = $_POST['password']; // text field for password
	
// store session data
$_SESSION['username']=$username;

//connect to the db 

$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

         //Our SQL Query
           $sql_query = "Select U.Username From user AS U, staff AS S Where U.Username = '$username' AND U.Password = '$password' AND U.Username = S.Username";  

         //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}
			if(mysqli_num_rows($result) == 1){ 
			//the username and password matches the database 
			//move them to the page to which they need to go 
				header('Location: AdminSummary.php');	
				//break;
			//Our SQL Query
			}
			
           $sql_query = "Select Username From user Where Username = '$username' AND Password = '$password'";  

            //Run our sql query
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}

			//this is where the actual verification happens 
			if(mysqli_num_rows($result) == 1){ 
			//the username and password matches the database 
			//move them to the page to which they need to go 
				header('Location: UserSummary.php');
			   
			}else{ 
			$err = 'Incorrect username or password' ; 
			} 
			//then just above your login form or where ever you want the error to be displayed you just put in 
			echo "$err";
    } 
	
?>
	
<center>

<div class="login">
<h1>Admin Login</h1>
<form action="adminlogin.php" method="post"  >
<table>
<tr>
    <td class="label">Username:</td>
    <td><input class="input" type="text" name="username" pattern="Admin" placeholder=" Username" required/></td>
</tr>
<tr>
    <td class="label">Password:</td>
    <td><input class="input" type="password" name="password" pattern = "admin@123" placeholder="********" required/></td><br><br>
</tr>
</table><br><br>

<input class="btn" type="Submit" value="Login"/><br>
</form>
</div>
<br><br>



<div class="login">
<h1>Student Login</h1>
<form action="" method="post">
<table>
<tr>
    <td class="label">Username:</td>
    <td><input class="input" type="text" name="username" placeholder=" Username" required/></td>
</tr>
<tr>
    <td class="label">Password:</td>
    <td><input class="input" type="password" name="password" placeholder="********" required/></td><br><br>
</tr>
</table><br><br>

<input class="btn" type="Submit" value="Login"/><br>
</form>

<form action="NewUserRegistration.php" method="post">
<input class="btn" type="Submit" value="Create Account"/>
</form>
</div>
<br>
<br>
<br>


</center>
</body>
</html>