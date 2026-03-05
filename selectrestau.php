<?php
require 'configrestau.php';

$stmt = $pdo->query("SELECT * FROM Customers ORDER BY customer_id ASC");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM MenuItems ORDER BY item_id ASC");
$menuitems = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT Orders.order_id, Customers.first_name, Customers.last_name, MenuItems.dish_name,
    MenuItems.price, Orders.quantity, Orders.order_date FROM Orders JOIN Customers ON Orders.customer_id = Customers.customer_id
    JOIN MenuItems ON Orders.item_id = MenuItems.item_id ORDER BY Orders.order_id DESC");

$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);    
?>