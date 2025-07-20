<?php
require_once 'includes/session_helper.php';
checkSessionTimeout();
authrizeUser();

require_once 'includes/valid.php';
$valid = new valid();

$user_id = $valid->getUserIdFromFile($_SESSION['username']);

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}


$username = $_SESSION['username'];


$cart = $_SESSION['cart'];
$total = 0;
$productDetails = [];

foreach ($cart as $item) {
    $productDetails[] = $item['name'] . ":" . $item['quantity'];
    $total += $item['price'] * $item['quantity'];
}

$timestamp = date("Y-m-d H:i:s");
$products = implode(",", $productDetails);
$line = "$user_id|$username|$timestamp|$products|$total" . PHP_EOL;

file_put_contents("data/Order_info.txt", $line, FILE_APPEND);

unset($_SESSION['cart']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/checkout.css">
</head>
<body>

<div class="success-box">
    <h2>✅ Your order has been placed successfully!</h2>
    <p>Thank you for shopping with us.</p>
    <a href="homePage.php">Continue Shopping</a>
</div>

</body>
</html>

