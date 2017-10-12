<?php
include 'dbinfo.php'; 
?>  
<?php
//always start the session before anything else!!!!!! 
session_start(); 
if(isset($_POST['isbn'])) {
$isbn = $_POST['isbn'];
$_SESSION['isbn'] = $isbn;
//connect to the db
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$sql_query = "Select S.ShelfID AS shelfid, S.AisleID AS aisleid, F.FloorID AS floorid, SU.SubName AS subname From book AS B, shelf AS S, floor AS F,subject AS SU
	Where B.ISBN = '$isbn' AND B.ShelfID = S.ShelfID AND B.SubName = SU.SubName AND S.FloorID = F.FloorID";
	//Run our sql query
    $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
	if($result == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);
	$shelfid = $row['shelfid'];
	$aisleid = $row['aisleid'];
	$floorid = $row['floorid'];
	$subname = $row['subname'];
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
table,tr,th,td{
	border: 1px solid;
	border-color: cadetblue;
	border-collapse: collapse;
}

</style>
</head>
<body>
<center>
<h1>Track Book Location</h1>
<table>
<tr>
    <td class="label">ISBN:</td>
    <td><?php echo $isbn; ?></td>
</tr>
<tr>
    <td class="label">Floor Number:</td>
    <td><?php echo $floorid; ?></td>
</tr>
<tr>
    <td class="label">Aisle Number:</td>
    <td><?php echo $aisleid; ?></td>
</tr>
<tr>
    <td class="label">Shelf Number:</td>
    <td><?php echo $shelfid; ?></td>
</tr>
<tr>
    <td class="label">Subject:</td>
    <td><?php echo $subname; ?></td>
</tr>
</table>
<br>
<form action="UserSummary.php" method="post">
<input class="btn" type="submit" value="Back"/>
</form>
<form action="Login.php" method="post">
<input class="btn" type="submit" value="Close"/>
</form>
</center>
</body>
</html>