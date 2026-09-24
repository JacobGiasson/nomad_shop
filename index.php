<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOMAD Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require_once('nav.php'); ?>

    <main class="page">

        <h1 class="page__title">NOMAD Shop</h1>
        <p class="page__subtitle">Management system for an outdoor hydration store.</p>

        <div class="card">
            <span class="card__label">Clients</span>
            <span class="card__value">
                <a href="client-index.php">Manage customers and their contact details</a>
            </span>

            <span class="card__label">Products</span>
            <span class="card__value">
                <a href="product-index.php">Manage the catalog, prices and stock</a>
            </span>

            <span class="card__label">Orders</span>
            <span class="card__value">
                <a href="order-index.php">Track orders and the client who placed them</a>
            </span>
        </div>

    </main>
</body>
</html>