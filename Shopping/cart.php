<?php
require_once 'includes/session_helper.php';
checkSessionTimeout();
authrizeUser();

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/cartStyle.css">
</head>
<body>

<div class="cart-container">
    <h2>Your Shopping Cart</h2>

    <?php if (empty($cart)): ?>
        <p class="empty-message">Your cart is empty. <a href="homePage.php">Go shopping</a></p>
    <?php else: ?>
        <form method="post" action="cart/update_cart.php">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price (SAR)</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                </tr>

                <?php foreach ($cart as $id => $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= number_format($item['price'], 2) ?></td>
                    <td>
                        <input type="number" name="quantities[<?= $id ?>]" value="<?= $item['quantity'] ?>" min="1">
                    </td>
                    <td><?= number_format($subtotal, 2) ?></td>
                    <td><a href="cart/remove_from_cart.php?id=<?= $id ?>">Remove</a></td>
                </tr>
                <?php endforeach; ?>
            </table>

            <div class="total">Total: <?= number_format($total, 2) ?> SAR</div>

            <br>
            <input type="submit" value="Update Cart" class="btn">
        </form>

        <div class="actions">
            <a href="homePage.php">← Continue Shopping</a>
            <a href="checkout.php"><button class="btn">Proceed to Checkout</button></a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
