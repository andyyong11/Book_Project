<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Bookstore</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- <header>
        <h1>Welcome to the Bookstore</h1>
        <nav>
            <a href="books.php">Browse Books</a>
            <a href="cart.php">Cart</a>
            <a href="add_books.php">Add a Book</a>
        </nav>
    </header> -->
    <?php include './header.php'; ?>
 
    <div class="container">
        <h2>Your Favorite Online Bookstore</h2>
        <p>Browse through our collection and add books to your cart.</p>
        <button onclick="window.location.href='./Shopping.php'">Start Shopping</button>
    </div>
 
    <?php include './footer.php'; ?>
</body>
</html>