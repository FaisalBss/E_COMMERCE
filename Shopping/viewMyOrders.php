<?php
require_once 'includes/session_helper.php';
checkSessionTimeout();
authrizeUser();

$username = $_SESSION['username'];
$file = 'data/Order_info.txt';

$orders = [];

if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $parts = explode('|', $line);
        if (count($parts) >= 5 && $parts[1] === $username) {
            $orders[] = [
                'date' => $parts[2],
                'products' => $parts[3],
                'total' => $parts[4]
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/myOrder.css">
</head>
<body>

<div class="container">
    <h2>📄 My Orders</h2>

    <?php if (empty($orders)): ?>
        <p>You have no orders yet.</p>
    <?php else: ?>
        <?php foreach ($orders as $order): ?>
            <div class="order-card">
                <div class="date">🕒 <?= htmlspecialchars($order['date']) ?></div>
                <div class="products">🛒 <?= htmlspecialchars($order['products']) ?></div>
                <div class="total">💵 Total: <?= number_format($order['total'], 2) ?> SAR</div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="homePage.php" class="back">← Back to Home</a>
</div>

</body>
</html>
