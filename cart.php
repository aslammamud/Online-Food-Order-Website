<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName="online_food_order";
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
require 'item.php';
if (isset ( $_GET ['id'] ) && !isset($_POST['update'])) {

	$result = mysqli_query ( $conn,'select * from burger where id='.$_GET['id']);
	$product = mysqli_fetch_object ( $result );
	$item = new Item ();
	$item->id = $product->id;
	$item->Name = $product->Name;
	$item->Price = $product->Price;
	$item->Quantity = 1;

	$index = - 1;
	if (isset ( $_SESSION ['cart'] )) {
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++)
		if ($cart [$i]->id == $_GET ['id']) {
			$index = $i;
			break;
		}
	}
	if ($index == - 1)
	$_SESSION ['cart'] [] = $item;
	else {
		$cart [$index]->Quantity ++;
		$_SESSION ['cart'] = $cart;
	}
}


if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
	$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
	unset ( $cart [$_GET ['index']] );
	$cart = array_values ( $cart );
	$_SESSION ['cart'] = $cart;
}


if(isset($_POST['update'])) {
	$arrQuantity = $_POST['Quantity'];


	$valid = 1;
	for($i=0; $i<count($arrQuantity); $i++)
	if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
		$valid = 0;
		break;
	}
	if($valid==1){
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++) {
			$cart[$i]->Quantity = $arrQuantity[$i];
		}
		$_SESSION ['cart'] = $cart;
	}
	else
		$error = 'Quantity is InValid';
}

?>

<html>
<head>
<meta charset="utf-8">
<title>Menu</title>
<link rel="stylesheet" type="text/css" href="style/Stylesheet.css">	

</head>
<body>
<div class="menu">
	<a href="user_home.php" class="brand"> <img src="img/infinity.png"></a>
	<nav>
		<ul>
			<li><a href="menu.php" target="_self">Menu</a></li>
				<li><a href="#">About</a></li>
				<li><a href="user_profile.php">Profile</a></li>
				<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>
</div>

<div id="header">
			Infinity Food Court
</div>

<?php echo isset($error) ? $error : ''; ?>
<div id="content">
<div id="Item">
<form method="post">
	<table class="menutable" cellpadding="6" cellspacing="6" border="2">
		<tr>
			<th>Items</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity <input
				type="hidden" name="update">
			</th>
			<th>Sub Total</th>
			<th>Option</th>
		</tr>
		<?php
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		$s = 0;
		$index = 0;
		$quantity = 0;
		for($i = 0; $i < count ( $cart ); $i ++) {
			$s += $cart [$i]->Price * $cart [$i]->Quantity;
			?>
		<tr>
			<td><?php echo $cart[$i]->id; ?></td>
			<td><?php echo $cart[$i]->Name; ?></td>
			<td><?php echo "‎৳ ",$cart[$i]->Price,"/="; ?></td>
			<td><input type="text" value="<?php echo $cart[$i]->Quantity; ?>"
				style="width: 50px;" name="Quantity[]"></td>
			<td><?php echo "‎৳ ",$cart[$i]->Price * $cart[$i]->Quantity,"/="; ?></td>
			<td><a href="cart.php?index=<?php echo $index; ?>"
				onclick="return confirm('Are you sure?')">Remove</a></td>
		</tr>
		<?php
		$quantity +=$cart[$i]->Quantity;
		$index ++;
		}
		?>
		<tr>
			<td colspan="1" align="right">Total Bill</td>
			<td align="left"><?php echo "‎৳ ",$s,"/="; $bill = $s;?></td>
		</tr>
	</table>
	<?php
		$_SESSION['total'] = $bill;
		if($bill != 0){
		$_SESSION['poriman'] = $quantity;
		}
	?>
	
</form>
<div id="butt">
<a href="checkout.php"><button type="Checkout">Checkout</button> </a>
<a href="menu.php"><button type="Shopping">Continue Shopping</button></a>
</div>
</div>
</div>

</body>
</html>