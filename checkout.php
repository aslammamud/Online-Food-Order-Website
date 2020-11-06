<?php 
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName="online_food_order";
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
require 'item.php';
?>
<?php 
$customer = $_SESSION['CustomerName'];
$bill = $_SESSION['total'];
$quantity = $_SESSION['poriman'];

?>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Menu</title>
            <link rel="stylesheet" type="text/css" href="style/Stylesheet.css">

        </head>

        <body>
            <div class="menu">
                <a href="index.html" class="brand"> <img src="img/infinity.png"></a>
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
            <div id="content">
                <div class="Item">			   
				   <?php 					
						mysqli_query($conn, 'insert into orders(datecreation, username, quantity, bill)
						values("'.date('Y-m-d H:i:s').'","'.$customer.'","'.$quantity.'","'.$bill.'")');
					?>
					
				<p id="header">Your order has been taken. Please wait patiently in queue. Thank you sir.<p> 

				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="menu.php"><button type="Shopping">Continue Shopping</button></a>
				<a href="logout.php"><button type="logout">Logout</button></a>
				</p>
				
                </div>
            </div>
        </body>

        </html>