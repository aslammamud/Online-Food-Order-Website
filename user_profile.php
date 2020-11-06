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
		<title>Profile Page</title>
		<link rel="stylesheet" type="text/css" href="style/Stylesheet.css">
	</head>
	<body class="loggedin">
	<div class="menu">
	<a href="user_home.php" class="brand"> <img src="img/infinity.png"></a>
		<nav>
			<ul>
				<li><a href="menu.php" target="_self">Menu</a></li>
				<li><a href="user_home.php">Home</a></li>
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
			<h2>Profile Page</h2>
			<div>
				<h1>Your account details are below:</h1>
				<table>
					<tr>
						<td>Name:</td>
						<td><?=$username;?> </td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><?=$gender?></td>
					</tr>
					<tr>
						<td>Phone:</td>
						<td><?=$phoneCode?><?=$phone?></td>
					</tr>
					<tr>
						<td> 
							<br>
							<a href="delete.php"><button type="submit"  onclick="return confirm('Are you sure you want to delete your profile?')">Delete Profile</button></a>
							<a href="update_user_profile.php"><button type="Update">Update Profile</button></a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>