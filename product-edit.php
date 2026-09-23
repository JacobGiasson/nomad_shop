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
    <title>Product Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="product-update.php" method="post">
            <h2>Product Edit</h2>

            <input type="hidden" name="id" value="<?= $id; ?>">

            <label>Name
                <input type="text" name="name" value="<?= $name; ?>" required>
            </label>
            <label>Description
                <textarea name="description" rows="4"><?= $description; ?></textarea>
            </label>
            <label>Price
                <input type="number" name="price" step="0.01" value="<?= $price; ?>" required>
            </label>
            <label>Stock
                <input type="number" name="stock" value="<?= $stock; ?>" required>
            </label>

            <input type="submit" class="btn" value="Save">
        </form>
        <a href="product-show.php?id=<?= $id; ?>">Cancel</a>
    </div>
</body>
</html>