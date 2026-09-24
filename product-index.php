<?php
// Affiche la liste de tous les produits
require_once('Classe/CRUD.php');

$crud = new CRUD;
$products = $crud->select('product', 'name');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">Products</h1>
        <p class="page__subtitle"><?= count($products); ?> items in the catalog</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product){ ?>
                <tr>
                    <td><a href="product-show.php?id=<?= $product['id']; ?>"><?= $product['name']; ?></a></td>
                    <td><?= $product['description']; ?></td>
                    <td><?= $product['price']; ?> $</td>
                    <td><?= $product['stock']; ?></td>
                    <td><a href="product-show.php?id=<?= $product['id']; ?>" class="btn btn--small">View</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="page__actions">
            <a href="product-create.php" class="btn btn--primary">New product</a>
        </div>

    </main>
</body>
</html>