<?php
require 'configrestau.php';

if (isset($_POST['submit_order'])) {

    $customer_id = $_POST['customer_id'];
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    
    $stmt = $pdo->prepare("INSERT INTO customers (customer_id, item_id, quantity, order_date)
    VALUES (?, ?, ?, NOW())");
    $stmt->execute([$customer_id, $item_id, $quantity]);

    header("Location: restaurant.php");
    exit();
}
?>