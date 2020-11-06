<?php
	session_start();

	if (!isset($_SESSION['loggedin'])) {
	header("Location: user.php");
	exit();
	}
	else{
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName="online_food_order";

	$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
	$result = mysqli_query($conn, 'select * from burger');
	}
?>

<html>
<head>
<meta charset="utf-8">
<title>Menu</title>
<link rel="stylesheet" type="text/css" href="style/stylesheet.css">	

</head>
<body>
<div class="menu">
	<a href="index.html" class="brand"> <img src="img/infinity.png"></a>
	<nav>
		<ul>
			<li><a href="menu.php">Menu</a>
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

<div id="content">
<div class="Item">
	<h2 class="m">Menu</h2>
	<table class="menutable">
	<tr>
	    <th>Id</th>
		<th>Name</th>
		<th>Size</th>
		<th>Price</th>
		<th>      </th>
	</tr>	
		<?php while($product = mysqli_fetch_object($result)) { ?>
		<tr>
			<td><?php echo $product->id; ?></td>
			<td><?php echo $product->Name; ?></td>
			<td><?php echo $product->Size; ?></td>
			<td><?php echo $product->Price; ?></td>
			<td><a href="cart.php?id=<?php echo $product->id; ?>">Order</a></td>
		</tr>
	<?php } ?>
</table>
</div>
</div>
</body>
</html>