<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
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
<h1>Request Extension On a Book</h1>

<form action="ExtensionResult.php" method="post">
<table>
<tr>
    <td class="label">Enter your issue ID:</td>
    <td><input type="text" name="issueid" required/></td>
</tr>
</table>

<br>
<input class="btn" type="submit" value="Submit"/>

</form>
<form action="UserSummary.php" method="post">
<input class="btn" type="submit" value="Back"/>
</form>

</center>
</body>
</html>