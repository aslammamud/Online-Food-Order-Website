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
		

		$sql = "SELECT * FROM signup where id='$_SESSION[id]'";
		$result = $conn->query($sql);
		
		if(isset($_POST['btn-update'])){
		 $update = "UPDATE signup SET username = '$_POST[username]', password = '$_POST[password]', gender = '$_POST[gender]', email ='$_POST[email]', phoneCode = '$_POST[phoneCode]', phone = '$_POST[phone]'  WHERE id ='$_SESSION[id]'";
		 $up = mysqli_query($conn, $update);
		 if(!isset($sql)){
		 die ("Error $sql" .mysqli_connect_error());
		 }
		 else
		 {
		 header("location: userprofile.php");
		 }
		}
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
	<a href="user_home.php" class="brand"> <img src="img/infinity.png"></a>
		<nav>
			<ul>
				<li><a href="#">Menu</a>
				</li>
				
				<li><a href="#">About</a></li>
				<li><a href="user_profile.php">Profile</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</div>
	<div id="header">
			Infinity Food Court
	</div>
		
		<div class="content">
			<h2>Profile Page</h2>
			<div >
				 <h1>Update Profile</h1>
				 <form method="POST">
				  <table>
					<?php
						if($result->num_rows >0){
						 while($row = $result->fetch_assoc()){
					?>
				   <tr><td>Name :</td><td>
				   <input type="text" name="username" placeholder="Name" value="<?php echo $row['username']; ?>">
				   </td></tr>
				   <tr><td>Email :</td><td>
				   <input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
				   </td></tr> 
				   <tr><td>Password :</td><td>
				   <input type="text" name="password" placeholder="Password" value="<?php echo $row['password']; ?>">
				   </td></tr>
				   <tr>
					<td>Gender :</td>
					<td>
					<input type="text" name="gender" placeholder="Gender" value="<?php echo $row['gender']; ?>">
					</td>
				   </tr>
					
				   <tr>
					<td>Phone no :</td>
					<td>
					<input type="text" name="phone" placeholder="Phone" value="<?php echo $row['phoneCode'].$row['phone']; ?>">
					</td>
					</tr>
					<tr><td><a href="userprofile.php"><button type="button" value="button">Cancel</button></a>
					<button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
					</td></tr>
				    <?php
						 }
						}
						?>
				  </table>   
				 </form>
				<script>
					function update(){
					 var x;
					 if(confirm("Continue?") == true){
					 x= "update";
					 }
					}
				</script>
				 </div>
		</div>
	</body>
</html>