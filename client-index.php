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
    <title>Clients</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Client List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clients as $client){ ?>
            <tr>
                <td><a href="client-show.php?id=<?= $client['id']; ?>"><?= $client['name']; ?></a></td>
                <td><?= $client['email']; ?></td>
                <td><?= $client['phone']; ?></td>
                <td><?= $client['city']; ?></td>
                <td><a href="client-show.php?id=<?= $client['id']; ?>" class="btn">View</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="client-create.php" class="btn">New Client</a>
    <a href="index.php">Home</a>
</body>
</html>