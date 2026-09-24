<?php
// Affiche la liste de tous les clients
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
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">Clients</h1>
        <p class="page__subtitle"><?= count($clients); ?> customers registered</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clients as $client){ ?>
                <tr>
                    <td><a href="client-show.php?id=<?= $client['id']; ?>"><?= $client['name']; ?></a></td>
                    <td><?= $client['email']; ?></td>
                    <td><?= $client['phone']; ?></td>
                    <td><?= $client['city']; ?></td>
                    <td><a href="client-show.php?id=<?= $client['id']; ?>" class="btn btn--small">View</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="page__actions">
            <a href="client-create.php" class="btn btn--primary">New client</a>
        </div>

    </main>
</body>
</html>