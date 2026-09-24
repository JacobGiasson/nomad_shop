<?php

if(!isset($_GET['id']) or $_GET['id'] == null){
    header('location:order-index.php');
    die();
}

$id = $_GET['id'];

require_once('Classe/CRUD.php');

$crud = new CRUD;
$order = $crud->selectId('orders', $id);

if($order == false){
    header('location:order-index.php');
    die();
}

$client = $crud->selectId('client', $order['client_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Show</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Order #<?= $order['id']; ?></h1>

        <p><strong>Client: </strong>
            <a href="client-show.php?id=<?= $client['id']; ?>"><?= $client['name']; ?></a>
        </p>
        <p><strong>Email: </strong><?= $client['email']; ?></p>
        <p><strong>City: </strong><?= $client['city']; ?></p>
        <p><strong>Date: </strong><?= $order['order_date']; ?></p>
        <p><strong>Total: </strong><?= $order['total']; ?> $</p>

        <a href="order-edit.php?id=<?= $order['id']; ?>" class="btn">Edit</a>

        <form action="order-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $order['id']; ?>">
            <input type="submit" value="Delete" class="btn red">
        </form>

        <a href="order-index.php">Back to list</a>
    </div>
</body>
</html>