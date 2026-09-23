<?php

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
    <div class="container">
        <form action="client-update.php" method="post">
            <h2>Client Edit</h2>

            <input type="hidden" name="id" value="<?= $id; ?>">

            <label>Name
                <input type="text" name="name" value="<?= $name; ?>" required>
            </label>
            <label>Email
                <input type="email" name="email" value="<?= $email; ?>" required>
            </label>
            <label>Phone
                <input type="text" name="phone" value="<?= $phone; ?>">
            </label>
            <label>Address
                <input type="text" name="address" value="<?= $address; ?>" required>
            </label>
            <label>City
                <input type="text" name="city" value="<?= $city; ?>" required>
            </label>
            <label>Zip Code
                <input type="text" name="zip_code" value="<?= $zip_code; ?>" required>
            </label>

            <input type="submit" class="btn" value="Save">
        </form>
        <a href="client-show.php?id=<?= $id; ?>">Cancel</a>
    </div>
</body>
</html>