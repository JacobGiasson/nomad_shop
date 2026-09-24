<?php
// Formulaire de creation d'une commande
require_once('Classe/CRUD.php');

$crud = new CRUD;
// On a besoin des clients pour remplir le menu deroulant
$clients = $crud->select('client', 'name');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">New order</h1>
        <p class="page__subtitle">Record an order for an existing client</p>

        <form action="order-store.php" method="post" class="card">

            <span class="card__label">Client</span>
            <select name="client_id" class="form__input" required>
                <option value="">Select a client</option>
                <?php foreach($clients as $client){ ?>
                <option value="<?= $client['id']; ?>"><?= $client['name']; ?></option>
                <?php } ?>
            </select>

            <span class="card__label">Order date</span>
            <input type="date" name="order_date" value="<?= date('Y-m-d'); ?>" class="form__input" required>

            <span class="card__label">Total</span>
            <input type="number" name="total" step="0.01" class="form__input" required>

            <input type="submit" class="btn btn--primary" value="Save order">
            <a href="order-index.php" class="btn">Cancel</a>

        </form>

    </main>
</body>
</html>