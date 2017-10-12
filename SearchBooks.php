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


<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
?> 
<body>
<center>
<h1>SearchBooks</h1>

<form action="HoldRequestforaBook.php" method="post">
<table>
<tr>
    <td class="label">ISBN:</td>
    <td><input type="text" name="isbn"/></td>
</tr>

<tr>
    <td class="label">Title:</td>
    <td><input type="text" name="title"/></td>
</tr>


<tr>
    <td class="label">Author:</td>
    <td><input type="text" name="author"/></td>
</tr>

</table>
<br>
<input class="btn" type="submit" value="Search"/>

</form>

<form action="UserSummary.php" method="post">
<input class="btn" type="submit" value="Back"/>
</form>

<form action="Login.php" method="post">
<input class="btn" type="submit" value="Close"/>
</form>

</center>
</body>
</html>