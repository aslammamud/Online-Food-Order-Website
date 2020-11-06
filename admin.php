<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'online_food_order';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {

	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if(isset($_POST['submit'])){
	if ( !isset($_POST['email'], $_POST['password']) ) {
		
		die ('Please fill both the email and password field!');
	}

	if ($stmt = $con->prepare('SELECT id, Password FROM admin WHERE email = ?')) {
		
		$stmt->bind_param('s', $_POST['email']);
		$stmt->execute();
		
		$stmt->store_result();
	}

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		
		if ($_POST['password'] === $password) {
			
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['email'];
			$_SESSION['id'] = $id;
			header('Location: admin_home.php');
		} else {
			echo 'Incorrect password!';
		}
	} else {
		echo 'Incorrect email!';
	}
	$stmt->close();
}
?>

<html>
<head>
  <meta charset="utf-8">
		<title>Admin Login</title>
		<link rel="stylesheet" type="text/css" href="style/stylesheet.css">
</head>

<body>
<div class="menu">
	<a href="index.html" class="brand"> <img src="img/infinity.png"></a>
	<nav>
		<ul>
			<li><a href="menu_unlogged" target="_self">Menu</a></li>
			<li><a href="#">About</a></li>
			<li><a href="signup.php">Signup</a></li>
			<li><a href="#">Login</a>
				<ul>
					<li><a href="admin.php">Admin</a></li>
					<li><a href="user.php">User</a></li>
				</ul>
			</li>	
		</ul>
	</nav>
</div>
<div id="header">
			Infinity Food Court
</div><br><br><br><br><br><br><br><br><br>
<div id="Login">
 <h1>Admin Login</h1>
 <form method="POST">
  <table>
   <tr>
    <td>Email :</td>
    <td><input type="email" name="email" placeholder="Email" required></td>
   </tr> 
   <tr>
    <td>Password :</td>
    <td><input type="password" name="password" placeholder="Password" required></td>
   </tr>
   
   <tr>
    <td> 
		<br><input type="submit" name="submit" value="Login">
	</td>
   </tr>
  </table>   
 </form>
 <a href="user.php"><button>User</button></a>
 </div>
</body>
</html>