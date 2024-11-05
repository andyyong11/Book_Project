<?php
session_start();

// Initialize the cart session variable if it's not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Generate a CSRF token to prevent cross-site request forgery
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a secure token
}

// Handle adding the book to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'], $_POST['title'], $_POST['author'], $_POST['price'], $_POST['csrf_token'])) {
    // Verify the CSRF token
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token.");
    }

    // Sanitize input to avoid XSS and validate numeric fields
    $bookId = filter_var($_POST['book_id'], FILTER_VALIDATE_INT);
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $price = floatval($_POST['price']); // Ensure price is a valid number

    if ($bookId === false || $price <= 0) {
        die("Invalid book details.");
    }

    // Book details to be added to the cart
    $book = [
        'id' => $bookId,
        'title' => $title,
        'author' => $author,
        'price' => $price
    ];

    // Add the book to the session cart
    $_SESSION['cart'][] = $book;
}

// Handle removing a book from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_id'], $_POST['csrf_token'])) {
    // Verify the CSRF token
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token.");
    }

    $removeId = filter_var($_POST['remove_id'], FILTER_VALIDATE_INT);
    // Search and remove the book with the specified ID
    foreach ($_SESSION['cart'] as $key => $cartItem) {
        if ($cartItem['id'] === $removeId) {
            unset($_SESSION['cart'][$key]);
            // Re-index the array to prevent gaps
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include '../header.php'; ?>
<h2>Your Shopping Cart</h2>

<?php if (!empty($_SESSION['cart'])): ?>
    <table>
        <tr>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $cartItem): ?>
            <tr>
                <td><?php echo htmlspecialchars($cartItem['id']); ?></td>
                <td><?php echo htmlspecialchars($cartItem['title']); ?></td>
                <td><?php echo htmlspecialchars($cartItem['author']); ?></td>
                <td><?php echo htmlspecialchars(number_format($cartItem['price'], 2)); ?></td> <!-- Format price to 2 decimal places -->
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="remove_id" value="<?php echo htmlspecialchars($cartItem['id']); ?>">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- CSRF token -->
                        <button type="submit">Remove from Cart</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>Total:
        <?php 
            $total = 0;
            foreach ($_SESSION['cart'] as $cartItem) {
                $total += $cartItem['price'];
            }
            echo number_format($total, 2); // Show total cart value
        ?>
    </p>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>

</body>
</html>