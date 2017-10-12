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
<h1>Track Book Location</h1>

<form action="TrackResult.php" method="post">
<table>
<tr>
    <td class="label">ISBN:</td>
    <td><input type="text" name="isbn" required/></td>
</tr>
</table>

<br>
<input class="btn" type="submit" value="Locate"/>
</form>

<form action="UserSummary.php" method="post">
<input class="btn" type="submit" value="Back"/>
</form>

</center>
</body>
</html>