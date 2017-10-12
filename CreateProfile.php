
<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['email']))  {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$name = "$firstname $lastname";
	$email = $_POST['email'];
	$DOB = $_POST['DOB'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$isfaculty = $_POST['isfaculty'];
	
	$username = $_SESSION['username'];
	
	if($isfaculty == "1") {
		$dept = $_POST['dept'];
	} else {
		$dept = null;
	}

	$insertStatement = "INSERT INTO student_faculty (Username, Name, DOB, Email, Gender, Address,
	IsFaculty, Dept) VALUES ('$username', '$name', '$DOB', '$email', '$gender', '$address', '$isfaculty',
	'$dept')";
	$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
	if($result == false) {
		echo 'The query failed.';
		exit();
	} else {
		header('Location: Login.php');
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
<h1>Create Profile</h1>

<form action="" method="post">
<table>
<tr>
    <td class="label">First Name:</td>
    <td><input type="text" name="firstname" required/></td>
</tr>
<tr>
    <td class="label">Last Name:</td>
    <td><input type="text" name="lastname" required/></td>
</tr>

<tr>
    <td class="label">D.O.B:</td>
    <td><input type="text" name="DOB"/></td>
</tr>

<tr>
    <td class="label">Email:</td>
    <td><input type="text" name="email" required/></td>
</tr>

<tr>
    <td class="label">Address:</td>
    <td><textarea name="address" rows="5" cols="30"></textarea></td>
</tr>




<tr>
    <td class="label">Gender:</td>



<td>
<select name="gender">
  <option value="M">Male</option>
  <option value="F">Female</option>
</select>
</td>

<tr>
    <td class="label">Are you a faculty</td>

<td>
<select name="isfaculty">
  <option value="1">Yes</option>
  <option value="0">No</option>
</td>

</select>
</tr>




<tr>
    <td class="label">Associate Department</td>


<td>
<select name="dept">
  <option value="School of Electrical & Computer Engineering">Electrical Engineering</option>
  <option value="College of Computing">Computer Science</option>
  <option value="School of Industrial & Systems Engineering">Industrial & Systems Engineering</option>
</select></td>

</tr>
</table>

<br>
<input class="btn" type="submit" value="Submit"/>
</form>

</center>
</body>
</html>