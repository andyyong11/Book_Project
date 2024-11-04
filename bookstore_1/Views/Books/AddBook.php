<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles.css">
    <title>Add Book</title>
</head>
<body>
<?php include '../../header.php'; ?>

<form action="/bookstore_1/bookstore/actions/add_book_to_cart.php" method="post">
    <div>
        <label for="title">Book Title</label>
        <input type="text" id="title" name="title" required />
    </div>
    <div>
        <label for="author">Author</label>
        <input type="text" id="author" name="author" required />
    </div>
    <div>
        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" required />
    </div>
    <div>
        <label for="publication_year">Publication Year</label>
        <input type="number" id="publication_year" name="publication_year" required />
    </div>
    <div>
            <label for="price">Price</label>
            <input type="text" id="price" name="price" required />
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" min="1" required />
        </div>
    <button type="submit">Add Book</button>
</form>
<?php include '../../footer.php'; ?>  
</body>
</html>
