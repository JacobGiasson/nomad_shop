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
    <div class="container">
        <form action="order-update.php" method="post">
            <h2>Edit order #<?= $order['id']; ?></h2>

            <input type="hidden" name="id" value="<?= $order['id']; ?>">

            <label>Client
                <select name="client_id" required>
                    <?php foreach($clients as $client){ ?>
                    <option value="<?= $client['id']; ?>" <?= $client['id'] == $order['client_id'] ? 'selected' : ''; ?>>
                        <?= $client['name']; ?>
                    </option>
                    <?php } ?>
                </select>
            </label>

            <label>Order date
                <input type="date" name="order_date" value="<?= $order['order_date']; ?>" required>
            </label>

            <label>Total
                <input type="number" name="total" step="0.01" value="<?= $order['total']; ?>" required>
            </label>

            <input type="submit" class="btn" value="Save">
        </form>
        <a href="order-show.php?id=<?= $order['id']; ?>">Cancel</a>
    </div>
</body>
</html>