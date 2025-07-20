<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // إذا كانت السلة فارغة أو غير موجودة، اجعلها مصفوفة
    $_SESSION['cart'] = $_SESSION['cart'] ?? [];

    // تحقق من الكمية الحالية إن وُجدت
    $current_quantity = $_SESSION['cart'][$product_id]['quantity'] ?? 0;

    // أضف أو حدث المنتج في السلة
    $_SESSION['cart'][$product_id] = [
        'name' => $product_name,
        'price' => $price,
        'quantity' => $current_quantity + $quantity
    ];

    header("Location: ../homePage.php");
    exit();
}
