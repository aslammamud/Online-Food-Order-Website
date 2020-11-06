<?php
		session_start();

		if (!isset($_SESSION['loggedin'])) {
			header("Location: user.php");
			exit();
		}
		

		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "online_food_order";

		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		

		$sql = "Delete FROM signup where id='$_SESSION[id]'";
		$result = $conn->query($sql);
	session_start();
	session_destroy();

	header('Location: index.html');
?>