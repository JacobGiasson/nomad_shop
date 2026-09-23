<?php

if(!isset($_GET['id']) or $_GET['id'] == null){
    header('location:product-index.php');
    die();
}

$id = $_GET['id'];

require_once('Classe/CRUD.php');

$crud = new CRUD;
$product = $crud->selectId('product', $id);

if($product){
    extract($product);
}else{
    header('location:product-index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Show</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1><?= $name; ?></h1>
        <p><strong>Description: </strong><?= $description; ?></p>
        <p><strong>Price: </strong><?= $price; ?> $</p>
        <p><strong>Stock: </strong><?= $stock; ?></p>

        <a href="product-edit.php?id=<?= $id; ?>" class="btn">Edit</a>

        <form action="product-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="submit" value="Delete" class="btn red">
        </form>

        <a href="product-index.php">Back to list</a>
    </div>
</body>
</html>