<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName="online_food_order";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
	$result = mysqli_query($conn, 'select * from burger');

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
			<li><a href="menu_unlogged.php">Menu</a>
			</li>
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
</div>

<div id="content">
<div class="Item">
	<table class="menutable">
	<tr>
	    <th>Id</th>
		<th>Name</th>
		<th>Size</th>
		<th>Price</th>
	</tr>
		
		<?php while($product = mysqli_fetch_object($result)) { ?>
		<tr>
			<td><?php echo $product->id; ?></td>
			<td><?php echo $product->Name; ?></td>
			<td><?php echo $product->Size; ?></td>
			<td><?php echo $product->Price; ?></td>
		</tr>
	<?php } ?>
</table>
<h2>Please login to purchase your favourite food.!!!</h2>
</div>
</div>
</body>
</html>