<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Create</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="client-store.php" method="post">
            <h2>New client</h2>
            <label>Name
                <input type="text" name="name" required>
            </label>
            <label>Email
                <input type="email" name="email" required>
            </label>
            <label>Phone
                <input type="text" name="phone">
            </label>
            <label>Address
                <input type="text" name="address" required>
            </label>
            <label>City
                <input type="text" name="city" required>
            </label>
            <label>Zip Code
                <input type="text" name="zip_code" required>
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
        <a href="client-index.php">Back to list</a>
    </div>
</body>
</html>