<?php include './header.php'; ?>
<?php include 'Controller/BooksController.php';

// Instantiate the controller
$booksController = new BooksController();

// Get the list of books
$books = $booksController->listBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Our Book Collection</h2>
    <table>
        <tr>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Publication Year</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php if (!empty($books)) : ?>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['id']); ?></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['genre']); ?></td>
                    <td><?php echo htmlspecialchars($book['publication_year']); ?></td>
                    <td><?php echo htmlspecialchars($book['price']); ?></td>
                    
                    <td>
                        <form action="actions/add_book_to_cart.php" method="post"> <!-- Adjusted action path -->
                            <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book['id']); ?>">
                            <input type="hidden" name="title" value="<?php echo htmlspecialchars($book['title']); ?>">
                            <input type="hidden" name="author" value="<?php echo htmlspecialchars($book['author']); ?>">
                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($book['price']); ?>">
                            <label>Quantity:</label>
                            <input type="number" name="quantity" value="1" min="1"> <!-- Quantity input -->
                            <input type="submit" value="Add to Cart">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr><td colspan="7">No books available.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php include './footer.php'; ?>
