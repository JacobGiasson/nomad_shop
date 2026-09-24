<?php
// Affiche la fiche d'un produit
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
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title"><?= $name; ?></h1>
        <p class="page__subtitle">Product #<?= $id; ?></p>

        <div class="card">
            <span class="card__label">Description</span>
            <span class="card__value"><?= $description; ?></span>

            <span class="card__label">Price</span>
            <span class="card__value"><?= $price; ?> $</span>

            <span class="card__label">Stock</span>
            <span class="card__value"><?= $stock; ?> units</span>
        </div>

        <div class="page__actions">
            <a href="product-edit.php?id=<?= $id; ?>" class="btn btn--primary">Edit</a>

            <form action="product-delete.php" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="submit" value="Delete" class="btn btn--danger">
            </form>

            <a href="product-index.php" class="btn">Back to list</a>
        </div>

    </main>
</body>
</html>