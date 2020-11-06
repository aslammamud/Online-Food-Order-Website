<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header("Location: user.php");
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

$stmt = $con->prepare('SELECT username,password,gender,email,phoneCode,phone FROM signup WHERE id = ?');
$stmt->bind_param('s', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $password, $gender, $email, $phoneCode, $phone);
$stmt->fetch();
$stmt->close();
$customer = $username;
$_SESSION['CustomerName'] = $customer;
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
				<li><a href="menu.php" target="_self">Menu</a></li>
				<li><a href="user_profile.php">Profile</a></li>
				<li><a href="#">About</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</div>
	<div id="header">
			Infinity Food Court
	</div>
	<br>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome!</p>
		</div>
	</body>
</html>