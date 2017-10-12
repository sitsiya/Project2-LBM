<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['confirmpassword']))  {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['confirmpassword']=$confirmpassword;
	
	if($password == $confirmpassword) {
		$insertStatement = "INSERT INTO user (Username, Password) VALUES ('$username', '$password')";
		$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
		if($result == false) {
			echo 'The query failed.';
			exit();
		} else {
			header('Location: CreateProfile.php');
		}
	} else {
		echo 'password not consistent';
	}
}
?>

<html>
<head>
<style>

body{
	background-color: azure;
	margin-top: 50px;
}
h1{
	color: navy;
}
.btn{
	border-radius: 20px;
	background-color: white;
	color: coral;
}
.label{
	color: cornflowerblue;
}


</style>
</head>
<body>
<center>
<h1>New User Registration</h1>

<form action="" method="post">
<table>
<tr>
    <td class="label">Username:</td>
    <td><input type="text" name="username" required/></td>
</tr>
<tr>
    <td class="label">Password:</td>
    <td><input type="password" name="password" required/></td>
</tr>

<tr>
    <td class="label">Confirm Password:</td>
    <td><input type="password" name="confirmpassword" required/></td>
</tr>
</table>
<br>
<input class="btn" type="submit" value="Register"/>
</form>

<form action="UserSummary.php" method="post">
<input class="btn" type="submit" value="Back"/>
</form>
</center>
</body>
</html>