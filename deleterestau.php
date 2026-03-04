<?php
require 'configrestau.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->execute([$id]);

    header("Location: restaurant.php");
    exit();
}
?>