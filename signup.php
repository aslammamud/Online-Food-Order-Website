<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$phoneCode = $_POST['phoneCode'];
	$phone = $_POST['phone'];
	if (!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "online_food_order";

		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error()) {
		 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		} else {
		 $SELECT = "SELECT email From signup Where email = ? Limit 1";
		 $INSERT = "INSERT Into signup (username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";

		 $stmt = $conn->prepare($SELECT);
		 $stmt->bind_param("s", $email);
		 $stmt->execute();
		 $stmt->bind_result($email);
		 $stmt->store_result();
		 $rnum = $stmt->num_rows;
		 if ($rnum==0) {
		  $stmt->close();
		  $stmt = $conn->prepare($INSERT);
		  $stmt->bind_param("sssssi", $username, $password, $gender, $email, $phoneCode, $phone);
		  $stmt->execute();
		  session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['email'];
			$_SESSION['id'] = $id;
			header("Location: user_home.php");
			  echo "New record inserted sucessfully";
		} else {
			  echo "Someone already used this email, try another!";
		 }
		 $stmt->close();
		 $conn->close();
		}
	} else {
		 echo "All field are required";
		 die();
	}

}

?>

<html>
<head>
  <meta charset="utf-8">
		<title>Signup</title>
		<link rel="stylesheet" type="text/css" href="style/stylesheet.css">
</head>

<body>
<div class="menu">
	<a href="index.html" class="brand"> <img src="img/infinity.png"></a>
	<nav>
		<ul>
			<li><a href="menu_unlogged" target="_self">Menu</a>
			</li>
			<li><a href="#">About</a></li>
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
 <h1>Signup</h1>
 <form action="signup.php" method="POST">
  <table>
   <tr>
    <td>Name :</td>
    <td><input type="text" name="username" required></td>
   </tr>
   <tr>
    <td>Password :</td>
    <td><input type="password" name="password" required></td>
   </tr>
   <tr>
    <td>Gender :</td>
    <td>
     <input type="radio" name="gender" value="Male" required>Male
     <input type="radio" name="gender" value="Female" required>Female
    </td>
   </tr>
   <tr>
    <td>Email :</td>
    <td><input type="email" name="email" required></td>
   </tr> 
   <tr>
    <td>Phone no :</td>
    <td>
     <select name="phoneCode" required>
      <option selected hidden value="">Select Code</option>
      <option value="015">015</option>
      <option value="016">016</option>
      <option value="017">017</option>
      <option value="018">018</option>
      <option value="019">019</option>
     </select>
     <input type="phone" name="phone" required>
    </td>
   </tr>
   <tr>
    <td> 
		<br><input type="submit" value="Signup">
	</td>
   </tr>
  </table>   
 </form>
 </div>
</body>
</html>