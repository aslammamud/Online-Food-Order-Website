<?php
	session_start();

	$key = array_search($_GET['id'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['qty_array'][$_GET['index']]);

	$_SESSION['qty_array'] = array_values($_SESSION['qty_array']);

	$_SESSION['message'] = "Product deleted from cart";
	header('location: view_cart.php');
?>