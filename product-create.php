<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">New product</h1>
        <p class="page__subtitle">Add an item to the catalog</p>

        <form action="product-store.php" method="post" class="card">

            <span class="card__label">Name</span>
            <input type="text" name="name" class="form__input" required>

            <span class="card__label">Description</span>
            <textarea name="description" rows="4" class="form__input"></textarea>

            <span class="card__label">Price</span>
            <input type="number" name="price" step="0.01" class="form__input" required>

            <span class="card__label">Stock</span>
            <input type="number" name="stock" value="0" class="form__input" required>

            <input type="submit" class="btn btn--primary" value="Save product">
            <a href="product-index.php" class="btn">Cancel</a>

        </form>

    </main>
</body>
</html>