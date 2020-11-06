<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: admin.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="style/stylesheet.css">
	</head>
	<body class="loggedin">
	<div class="menu">
	<a href="#" class="brand"> <img src="img/infinity.png"></a>
		<nav>
			<ul>
				<li><a href="admin_home.php">Home</a></li>
				<li><a href="admin_profile.php">Profile</a></li>
				<li><a href="order_details.php">Orders</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</div>
	<div id="header">
			Infinity Food Court
	</div>
	<br><br>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome, Admin!</p>
		</div>
	</body>
</html>