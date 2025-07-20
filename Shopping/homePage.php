<?php
require_once 'includes/session_helper.php';
checkSessionTimeout();
authrizeUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="styleSheet" href="styles/homePage_style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<header>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
    <div class="signout">
        <a href="cart.php" style="margin-right: 15px; background: var(--accent);">🛒 View Cart</a>
         <a href="viewMyOrders.php" style="margin-right: 10px; background: var(--primary);">📄 My Orders</a>
        <a href="includes/logout.php">Sign Out</a>
    </div>
</header>

<div class="main">
    <div class="grid">
        <div class="card">
            <img src="images/iphone16.jpg" alt="iphone 16">
            <div class="card-content">
                <h3>iphone16</h3>
                <p>Aluminum design Latest-generation Ceramic Shield front Color-infused glass back Black.</p>
<form method="post" action="cart/add_to_cart.php">
    <input type="hidden" name="product_id" value="1">
    <input type="hidden" name="product_name" value="iPhone 16">
    <input type="hidden" name="price" value="3500">
    
    <input type="number" name="quantity" min="1" value="1" required>
    <input type="submit" value="Add to Cart">
</form>

            </div>
        </div>
        <div class="card">
            <img src="images/macbook.jpg" alt="macbook">
            <div class="card-content">
                <h3>macbook</h3>
                
                <p>MacBooks offer a premium computing experience with powerful performance, stunning displays, long battery life, and a user-friendly interface, all within a sleek and portable design.</p>
<form method="post" action="cart/add_to_cart.php">
    <input type="hidden" name="product_id" value="2">
    <input type="hidden" name="product_name" value="macbook">
    <input type="hidden" name="price" value="4000">
    
    <input type="number" name="quantity" min="1" value="1" required>
    <input type="submit" value="Add to Cart">
</form>

            </div>
        </div>
        <div class="card">
            <img src="images/ipad.jpg" alt="ipad">
            <div class="card-content">
                <h3>Ipad</h3>
                <p>This is a short description for the third item.</p>
<form method="post" action="cart/add_to_cart.php">
    <input type="hidden" name="product_id" value="3">
    <input type="hidden" name="product_name" value="ipad">
    <input type="hidden" name="price" value="2500">
    
    <input type="number" name="quantity" min="1" value="1" required>
    <input type="submit" value="Add to Cart">
</form>

            </div>
        </div>
    </div>
</div>

<footer>
    &copy; 2025 My Website. All rights reserved.
</footer>

</body>
</html>
