<?php
require 'configrestau.php';

if(isset($_POST['update_order'])) {

    $stmt = $pdo->prepare("UPDATE orders SET quantity = ? WHERE order_id = ?");
    $stmt->execute([$_POST['quantity'], $_POST['order_id']]);
    header("Location: restaurant.php?page=orders");
    exit();
}

if(isset($_POST['update_customer'])) {

    $stmt = $pdo->prepare("UPDATE customers SET first_name = ?, last_name = ?, phone_number = ? WHERE customer_id = ?");
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['phone_number'], $_POST['customer_id']]);
    header("Location: restaurant.php?page=customers");
    exit();
}

if(isset($_POST['update_menu_item'])){

    $stmt = $pdo->prepare("UPDATE MenuItems 
        SET dish_name=?, price=?, category=? 
        WHERE item_id=?");

    $stmt->execute([
        $_POST['dish_name'],
        $_POST['price'],
        $_POST['category'],
        $_POST['item_id']
    ]);

    header("Location: restaurant.php?page=menuitems");
    exit();
}
?>