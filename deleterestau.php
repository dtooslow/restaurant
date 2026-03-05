<?php
require 'configrestau.php';

if(isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];

    if($type == "order"){
        $stmt = $pdo->prepare("DELETE FROM Orders WHERE order_id = ?");
        $stmt->execute([$id]);
        header("Location: restaurant.php?page=orders");
    }

    if($type == "customer"){
        $stmt = $pdo->prepare("DELETE FROM Customers WHERE customer_id = ?");
        $stmt->execute([$id]);
        header("Location: restaurant.php?page=customers");
    }
    
    if($type == "menuitem"){
        $stmt = $pdo->prepare("DELETE FROM MenuItems WHERE item_id = ?");
        $stmt->execute([$id]);
        header("Location: restaurant.php?page=menuitems");
    }
    exit();
}
?>