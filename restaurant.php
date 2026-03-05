<?php
require 'insertrestau.php';
require 'updaterestau.php';
require 'deleterestau.php';
require 'selectrestau.php';

$page = $_GET['page'] ?? 'orders';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body style="background-color: skyblue;">
    <div class="container mt-5">
    <div class="card shadow-lg">

    <div class="card-header bg-white">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link <?= $page== 'orders'?'active':''?>" href="?page=orders">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $page== 'customers'?'active':''?>" href="?page=customers">Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $page== 'menuitems'?'active':''?>" href="?page=menuitems">Menu Items</a>
      </li>
    </ul>
  </div>
  <div class="card-body">

<?php if($page == 'orders'): ?>
    <h4 class="mb-4">Place New Order</h4>

<form method="POST" action="insertrestau.php" class="row g-3 align-items-end">
    <div class="col-md-4">
        <label class="form-label">Customer</label>
        <select name="customer_id" class="form-select" required>
            <?php foreach($customers as $customer): ?>
                <option value="<?= $customer['customer_id']; ?>">
                    <?= $customer['first_name']." ".$customer['last_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
            </div>

    <div class="col-md-4">
        <label class="form-label">Menu Item</label>
        <select name="item_id" class="form-select" required>
            <?php foreach($menuitems as $item): ?>
                <option value="<?= $item['item_id']; ?>">
                    <?= $item['dish_name']; ?> (₱<?= $item['price']; ?>)
                </option>
            <?php endforeach; ?>
        </select>
            </div>
        
    <div class="col-md-2">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" min="1" required>
    </div>

    <div class="col-md-2 d-flex align-items-end">
        <button type="submit" name="submit_order" class="btn btn-dark w-100 h-100">Submit Order</button>
    </div>
</form>

<hr>

<table class="table table-hover text-center align-middle">
    <thead class="table-secondary">
    <tr>
    <th>ID</th>
    <th>Customer</th>
    <th>Dish</th>
    <th>Total</th>
    <th>Date</th>
    <th>Action</th>
    </tr>
    </thead>

<tbody>
    <?php foreach($orders as $order): ?>
    <tr>
        <td>#<?= $order['order_id']; ?></td>
        <td><?= $order['first_name']." ".$order['last_name']; ?></td>
        <td><?= $order['dish_name']; ?> (x<?= $order['quantity']; ?>)</td>
        <td>₱<?= number_format($order['price'] * $order['quantity'], 2); ?></td>
        <td><?= date("M d, H:i", strtotime($order['order_date'])); ?></td>
        <td>
            <a href="deleterestau.php?id=<?= $order['order_id']; ?>" class="btn btn-sm btn-danger">X</a>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>

<?php elseif($page == 'customers'): ?>

<h4 class="mb-4">Add Customer</h4>
<form method="POST" action="insertrestau.php" class="row g-3 align-items-end">
    <div class="col-md-3">
        <label class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Phone Number</label>
        <input type="text" name="phone_number" class="form-control" required>
    </div>
    <div class="col-md-3">
        <button type="submit" name="submit_customer" class="btn btn-dark w-100 h-100">Add Customer</button>
    </div>
</form>

<hr>

<table class="table table-hover text-center align-middle">
    <thead class="table-secondary">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        </tr>
</thead>
<tbody>
    <?php foreach($customers as $customer): ?>
    <tr>
        <td>#<?= $customer['customer_id']; ?></td>
        <td><?= $customer['first_name']; ?></td>
        <td><?= $customer['last_name']; ?></td>
        <td><?= $customer['phone_number']; ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
    </table>

<?php elseif($page == 'menuitems'): ?>

<h4 class="mb-4">Add Menu Item</h4>
<form method="POST" action="insertrestau.php" class="row g-3 align-items-end">
    <div class="col-md-4">
        <label class="form-label">Dish Name</label>
        <input type="text" name="dish_name" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control" step="0.01" min="0" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Category</label>
        <input type="text" name="category" class="form-control" required>
    </div>
    <div class="col-md-3">
        <button type="submit" name="submit_menu_item" class="btn btn-dark w-100 h-100">Add Menu Item</button>
    </div>
</form>

<hr>

<table class="table table-hover text-center align-middle">
    <thead class="table-secondary">
    <tr>
        <th>ID</th>
        <th>Dish Name</th>
        <th>Price</th>
        <th>Category</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($menuitems as $item): ?>
    <tr>
        <td><?= $item['item_id']; ?></td>
        <td><?= $item['dish_name']; ?></td>
        <td>₱<?= number_format($item['price'], 2); ?></td>
        <td><?= $item['category'];?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>


  </div>
</div>
</div>


  </body>
</html>