<?php
require 'insert.php';
require 'update.php';
require 'delete.php';
require 'select.php';
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
        <a class="nav-link active" href="#">Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#">Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Menu Items</a>
      </li>
    </ul>
  </div>

  <div class="card-body">
    <h4 class="mb-4">Place New Order</h4>

<form method="POST" action="insert.php" class="row g-3 align-items-end">
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

<table class="table table-hover text-centeer align-middle">
    <thead class="table-gray">
    <tr>
    <th>ID</th>
    <th>Customer</th>
    <th>Dish</th>
    <th>Total</th>
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






    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>


  </body>
</html>