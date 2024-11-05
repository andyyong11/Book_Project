<?php
// Check if the cart is not empty
if (!empty($_SESSION['cart'])): ?>
    <h1>Your Shopping Cart</h1>
    <table>
        <tr>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
        $totalCost = 0;
        foreach ($_SESSION['cart'] as $item) {
            // Check each required key exists in $item array
            $id = htmlspecialchars($item['id'] ?? '');
            $title = htmlspecialchars($item['title'] ?? '');
            $author = htmlspecialchars($item['author'] ?? '');
            $price = number_format($item['price'] ?? 0, 2);
            $quantity = htmlspecialchars($item['quantity'] ?? 1);
            $itemTotal = number_format(($item['price'] ?? 0) * $quantity, 2);
            $totalCost += ($item['price'] ?? 0) * $quantity;
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $author; ?></td>
                <td>$<?php echo $price; ?></td>
                <td>
                    <input type="number" name="quantity[<?php echo $id; ?>]" value="<?php echo $quantity; ?>" min="1">
                </td>
                <td>$<?php echo $itemTotal; ?></td>
                <td>
                    <form action="actions/remove_book_to_cart.php" method="post">
                        <input type="hidden" name="book_id" value="<?php echo $id; ?>">
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="5"><strong>Total:</strong></td>
            <td colspan="2">$<?php echo number_format($totalCost, 2); ?></td>
        </tr>
    </table>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
