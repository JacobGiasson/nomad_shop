<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="product-store.php" method="post">
            <h2>New product</h2>
            <label>Name
                <input type="text" name="name" required>
            </label>
            <label>Description
                <textarea name="description" rows="4"></textarea>
            </label>
            <label>Price
                <input type="number" name="price" step="0.01" required>
            </label>
            <label>Stock
                <input type="number" name="stock" value="0" required>
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
        <a href="product-index.php">Back to list</a>
    </div>
</body>
</html>