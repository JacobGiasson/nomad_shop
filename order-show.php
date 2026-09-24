<?php
// Affiche une commande et le client qui l'a passer
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
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">Order #<?= $order['id']; ?></h1>
        <p class="page__subtitle">Placed on <?= $order['order_date']; ?></p>

        <div class="card">
            <span class="card__label">Client</span>
            <span class="card__value">
                <a href="client-show.php?id=<?= $client['id']; ?>"><?= $client['name']; ?></a>
            </span>

            <span class="card__label">Email</span>
            <span class="card__value"><?= $client['email']; ?></span>

            <span class="card__label">Shipping address</span>
            <span class="card__value"><?= $client['address']; ?>, <?= $client['city']; ?> <?= $client['zip_code']; ?></span>

            <span class="card__label">Total</span>
            <span class="card__value"><?= $order['total']; ?> $</span>
        </div>

        <div class="page__actions">
            <a href="order-edit.php?id=<?= $order['id']; ?>" class="btn btn--primary">Edit</a>

            <form action="order-delete.php" method="post">
                <input type="hidden" name="id" value="<?= $order['id']; ?>">
                <input type="submit" value="Delete" class="btn btn--danger">
            </form>

            <a href="order-index.php" class="btn">Back to list</a>
        </div>

    </main>
</body>
</html>