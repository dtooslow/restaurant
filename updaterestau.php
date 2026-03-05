<?php
require 'configrestau.php';

if(isset($_POST['update_order'])) {

    $order_id = $_POST['order_id'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("UPDATE orders SET quantity = :quantity WHERE order_id = :order_id");
    $stmt->execute(['quantity' => $quantity, 'order_id' => $order_id]);

    header("Location: restaurant.php?page=orders");
    exit();
}