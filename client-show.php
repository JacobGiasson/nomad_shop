<?php
// Affiche la fiche d'un client
if(!isset($_GET['id']) or $_GET['id'] == null){
    header('location:client-index.php');
    die();
}

$id = $_GET['id'];

require_once('Classe/CRUD.php');

$crud = new CRUD;
$client = $crud->selectId('client', $id);

if($client){
    extract($client);
}else{
    header('location:client-index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Show</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title"><?= $name; ?></h1>
        <p class="page__subtitle">Client #<?= $id; ?></p>

        <div class="card">
            <span class="card__label">Email</span>
            <span class="card__value"><?= $email; ?></span>

            <span class="card__label">Phone</span>
            <span class="card__value"><?= $phone; ?></span>

            <span class="card__label">Address</span>
            <span class="card__value"><?= $address; ?></span>

            <span class="card__label">City</span>
            <span class="card__value"><?= $city; ?></span>

            <span class="card__label">Zip code</span>
            <span class="card__value"><?= $zip_code; ?></span>
        </div>

        <div class="page__actions">
            <a href="client-edit.php?id=<?= $id; ?>" class="btn btn--primary">Edit</a>

            <form action="client-delete.php" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="submit" value="Delete" class="btn btn--danger">
            </form>

            <a href="client-index.php" class="btn">Back to list</a>
        </div>

    </main>
</body>
</html>