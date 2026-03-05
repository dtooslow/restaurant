<?php
require 'configrestau.php';

if (isset($_POST['submit_customer'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];

    $sql = "INSERT INTO customers (first_name, last_name, phone_number)
    VALUES (?, ?, ?)";



    $stmt = $pdo->prepare($sql);
    $stmt->execute([$first_name, $last_name, $phone_number]);

    header("Location: restaurant.php?page=customers");
    exit();
}

if (isset($_POST['submit_menu_item'])) {

    $dish_name = $_POST['dish_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "INSERT INTO MenuItems (dish_name, price, category)
    VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$dish_name, $price, $category]);

    header("Location: restaurant.php?page=menuitems");
    exit();
}



if (isset($_POST['submit_order'])) {

    $customer_id = $_POST['customer_id'];
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    
    $stmt = $pdo->prepare("INSERT INTO Orders (customer_id, item_id, quantity, order_date)
    VALUES (?, ?, ?, NOW())");
    $stmt->execute([$customer_id, $item_id, $quantity]);

    header("Location: restaurant.php");
    exit();
}
?>