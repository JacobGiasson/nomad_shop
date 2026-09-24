<?php
// Formulaire de modification d'un produit
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
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">Edit <?= $name; ?></h1>
        <p class="page__subtitle">Product #<?= $id; ?></p>

        <form action="product-update.php" method="post" class="card">

            <input type="hidden" name="id" value="<?= $id; ?>">

            <span class="card__label">Name</span>
            <input type="text" name="name" value="<?= $name; ?>" class="form__input" required>

            <span class="card__label">Description</span>
            <textarea name="description" rows="4" class="form__input"><?= $description; ?></textarea>

            <span class="card__label">Price</span>
            <input type="number" name="price" step="0.01" value="<?= $price; ?>" class="form__input" required>

            <span class="card__label">Stock</span>
            <input type="number" name="stock" value="<?= $stock; ?>" class="form__input" required>

            <input type="submit" class="btn btn--primary" value="Save changes">
            <a href="product-show.php?id=<?= $id; ?>" class="btn">Cancel</a>

        </form>

    </main>
</body>
</html>