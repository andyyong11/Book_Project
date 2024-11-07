<?php include '../../templates/header.php'; ?>
<?php
require_once '../../Model/Cart.php'; // Make sure this includes the model where the session is already started

// Initialize the cart model
$cart = new Cart();

// Handle item removal if a "remove" request is made
if (isset($_GET['remove_id'])) {
    $cart->removeItem($_GET['remove_id']);
    header("Location: Cart.php"); // Refresh the page to update the cart view
    exit;
}

// Get all items in the cart and calculate the total
$items = $cart->getItems();
$total = $cart->getTotal();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
    <div Class="container">
    <h2>Your Shopping Cart</h2>
    <?php if (!empty($items)) : ?>
        <table Class = "table">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php foreach ($items as $id => $item) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['title'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($item['author'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($item['price'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity'] ?? ''); ?></td>
                    <td><a href="Cart.php?remove_id=<?php echo $id; ?>" class="btn btn-danger">Remove</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>Total: <?php echo htmlspecialchars($total); ?></p>
    <?php else : ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <a href="../Books/Shopping.php" class="btn btn-primary">Continue Shopping</a>
    <?php include '../../templates/footer.php'; ?>
    </div>
</body>
</html>
