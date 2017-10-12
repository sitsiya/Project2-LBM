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
<h1>Admin Summary</h1>

<form action="PopularSubjectReport.php" method="post">
<input class="btn" type="submit" value="Popular Subject Report"/>
</form>

<form action="FrequentUsersReport.php" method="post">
<input class="btn" type="submit" value="Frequent User Report"/>
</form>

<form action="PopularBooksReport.php" method="post">
<input class="btn" type="submit" value="Popular Books Report"/>
</form>

<form action="DamagedBooksReport.php" method="post">
<input class="btn" type="submit" value="Damaged Books Report"/>
</form>

<form action="LostDamagedBook_Admin.php" method="post">
<input class="btn" type="submit" value="Lost/Damaged Book"/>
</form>

<form action="Login.php" method="post">
<input class="btn" type="submit" value="Close"/>
</form>

</center>
</body>
</html>