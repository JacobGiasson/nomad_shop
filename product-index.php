<?php

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
    <h1>Product List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Show</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product){ ?>
            <tr>
                <td><a href="product-show.php?id=<?= $product['id']; ?>"><?= $product['name']; ?></a></td>
                <td><?= $product['price']; ?> $</td>
                <td><?= $product['stock']; ?></td>
                <td><a href="product-show.php?id=<?= $product['id']; ?>" class="btn">View</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="product-create.php" class="btn">New Product</a>
    <a href="index.php">Home</a>
</body>
</html>