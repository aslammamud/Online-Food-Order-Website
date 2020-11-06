<?php 
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName="online_food_order";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
require 'item.php';
$print = mysqli_query($conn, 'select * from orders');

?>

        <html>
        <head>
            <meta charset="utf-8">
            <title>Menu</title>
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
            <div id="content">
                <div class="Item">			   
				<h2 style="color:#000;padding-left: 190px;">Order Details</h2>
	<table class="menutable">
	<tr>
	    <th>Id</th>
		<th>Name</th>
		<th>Quantity</th>
		<th>Total Bill</th>
		<th>Order Time</th>
	</tr>	
		<?php while($product = mysqli_fetch_object($print)) { ?>
		<tr>
			<td><?php echo $product->id; ?></td>
			<td><?php echo $product->username; ?></td>
			<td><?php echo $product->quantity; ?></td>
			<td><?php echo $product->bill; ?></td>
			<td><?php echo $product->datecreation; ?></td>
		</tr>
	<?php } ?>
</table>	
                </div>
            </div>
        </body>

        </html>