<?php
// Formulaire de modification d'une commande
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

$clients = $crud->select('client', 'name');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">Edit order #<?= $order['id']; ?></h1>
        <p class="page__subtitle">Placed on <?= $order['order_date']; ?></p>

        <form action="order-update.php" method="post" class="card">

            <input type="hidden" name="id" value="<?= $order['id']; ?>">

            <span class="card__label">Client</span>
            <select name="client_id" class="form__input" required>
                <?php foreach($clients as $client){ ?>
                <option value="<?= $client['id']; ?>" <?= $client['id'] == $order['client_id'] ? 'selected' : ''; ?>>
                    <?= $client['name']; ?>
                </option>
                <?php } ?>
            </select>

            <span class="card__label">Order date</span>
            <input type="date" name="order_date" value="<?= $order['order_date']; ?>" class="form__input" required>

            <span class="card__label">Total</span>
            <input type="number" name="total" step="0.01" value="<?= $order['total']; ?>" class="form__input" required>

            <input type="submit" class="btn btn--primary" value="Save changes">
            <a href="order-show.php?id=<?= $order['id']; ?>" class="btn">Cancel</a>

        </form>

    </main>
</body>
</html>