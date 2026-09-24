<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;
$orders = $crud->select('orders', 'order_date', 'DESC');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Order List</h1>
    <table>
        <thead>
            <tr>
                <th>Order #</th>
                <th>Client</th>
                <th>Date</th>
                <th>Total</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order){
                
                $client = $crud->selectId('client', $order['client_id']);
            ?>
            <tr>
                <td><?= $order['id']; ?></td>
                <td><?= $client['name']; ?></td>
                <td><?= $order['order_date']; ?></td>
                <td><?= $order['total']; ?> $</td>
                <td><a href="order-show.php?id=<?= $order['id']; ?>" class="btn">View</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="order-create.php" class="btn">New Order</a>
    <a href="index.php">Home</a>
</body>
</html>