<?php
// Affiche la liste des commandes
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
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">Orders</h1>
        <p class="page__subtitle"><?= count($orders); ?> orders placed</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Client</th>
                    <th>City</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order){
                    
                    $client = $crud->selectId('client', $order['client_id']);
                ?>
                <tr>
                    <td>#<?= $order['id']; ?></td>
                    <td><a href="client-show.php?id=<?= $client['id']; ?>"><?= $client['name']; ?></a></td>
                    <td><?= $client['city']; ?></td>
                    <td><?= $order['order_date']; ?></td>
                    <td><?= $order['total']; ?> $</td>
                    <td><a href="order-show.php?id=<?= $order['id']; ?>" class="btn btn--small">View</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="page__actions">
            <a href="order-create.php" class="btn btn--primary">New order</a>
        </div>

    </main>
</body>
</html>