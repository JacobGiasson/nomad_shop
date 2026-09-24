<?php

require_once('Classe/CRUD.php');

$crud = new CRUD;

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
    <div class="container">
        <form action="order-store.php" method="post">
            <h2>New order</h2>

            <label>Client
                <select name="client_id" required>
                    <option value="">-- Select a client --</option>
                    <?php foreach($clients as $client){ ?>
                    <option value="<?= $client['id']; ?>"><?= $client['name']; ?></option>
                    <?php } ?>
                </select>
            </label>

            <label>Order date
                <input type="date" name="order_date" value="<?= date('Y-m-d'); ?>" required>
            </label>

            <label>Total
                <input type="number" name="total" step="0.01" required>
            </label>

            <input type="submit" class="btn" value="Save">
        </form>
        <a href="order-index.php">Back to list</a>
    </div>
</body>
</html>