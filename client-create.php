<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">New client</h1>
        <p class="page__subtitle">Add a customer to the database</p>

        <form action="client-store.php" method="post" class="card">

            <span class="card__label">Name</span>
            <input type="text" name="name" class="form__input" required>

            <span class="card__label">Email</span>
            <input type="email" name="email" class="form__input" required>

            <span class="card__label">Phone</span>
            <input type="text" name="phone" class="form__input">

            <span class="card__label">Address</span>
            <input type="text" name="address" class="form__input" required>

            <span class="card__label">City</span>
            <input type="text" name="city" class="form__input" required>

            <span class="card__label">Zip code</span>
            <input type="text" name="zip_code" class="form__input" required>

            <input type="submit" class="btn btn--primary" value="Save client">
            <a href="client-index.php" class="btn">Cancel</a>

        </form>

    </main>
</body>
</html>