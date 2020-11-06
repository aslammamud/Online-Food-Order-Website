<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: admin.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'online_food_order';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT Name,Password FROM admin WHERE id = ?');

$stmt->bind_param('s', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($name,$password);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link rel="stylesheet" type="text/css" href="style/stylesheet.css">
	</head>
	<body class="loggedin">
	<div class="menu">
	<a href="admin_home.php" class="brand"> <img src="img/infinity.png"></a>
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
		
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Name:</td>
						<td><?=$name?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					
				</table>
			</div>
		</div>
	</body>
</html>