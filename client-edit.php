<?php
// Formulaire de modification d'un client
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
    <title>Client Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">Edit <?= $name; ?></h1>
        <p class="page__subtitle">Client #<?= $id; ?></p>

        <form action="client-update.php" method="post" class="card">

            <input type="hidden" name="id" value="<?= $id; ?>">

            <span class="card__label">Name</span>
            <input type="text" name="name" value="<?= $name; ?>" class="form__input" required>

            <span class="card__label">Email</span>
            <input type="email" name="email" value="<?= $email; ?>" class="form__input" required>

            <span class="card__label">Phone</span>
            <input type="text" name="phone" value="<?= $phone; ?>" class="form__input">

            <span class="card__label">Address</span>
            <input type="text" name="address" value="<?= $address; ?>" class="form__input" required>

            <span class="card__label">City</span>
            <input type="text" name="city" value="<?= $city; ?>" class="form__input" required>

            <span class="card__label">Zip code</span>
            <input type="text" name="zip_code" value="<?= $zip_code; ?>" class="form__input" required>

            <input type="submit" class="btn btn--primary" value="Save changes">
            <a href="client-show.php?id=<?= $id; ?>" class="btn">Cancel</a>

        </form>

    </main>
</body>
</html>