<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
//connect to the db 
$username = $_SESSION['username'];
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);	
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
<h1>User Summary</h1>

<form action="SearchBooks.php" method="post">
<input class="btn" type="submit" value="Search Books"/>
</form>

<form action="TrackBookLocation.php" method="post">
<input class="btn" type="submit" value="Track Book Location"/>
</form>

<form action="BookCheckout.php" method="post">
<input class="btn" type="submit" value="Checkout Book"/>
</form>

<form action="FutureHoldRequestforaBook.php" method="post">
<input class="btn" type="submit" value="Future Hold Request"/>
</form>

<form action="RequestExtensionOnaBook.php" method="post">
<input class="btn" type="submit" value="Extension Request"/>
</form>

<form action="ReturnBook.php" method="post">
<input class="btn" type="submit" value="Return Book"/>
</form>

<form action="Login.php" method="post">
<input class="btn" type="submit" value="Close"/>
</form>
</center>
</body>
</html>