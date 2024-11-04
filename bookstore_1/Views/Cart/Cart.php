<?php if (!empty($cartItems)): ?>
    <?php foreach ($cartItems as $cartItem): ?>
        <?php $book = $cartItem['book']; ?>
        <form action="update_cart.php" method="post">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book->title); ?>" readonly />
            </div>
            <div>
                <label for="author">Author</label>
                <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book->author); ?>" readonly />
            </div>
            <div>
                <label for="genre">Genre</label>
                <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($book->genre); ?>" readonly />
            </div>
            <div>
                <label for="publication_year">Publication Year</label>
                <input type="number" id="publication_year" name="publication_year" value="<?php echo htmlspecialchars($book->publication_year); ?>" readonly />
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="1" required value="<?php echo htmlspecialchars($cartItem['quantity']); ?>" />
            </div>
            <div>
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($book->price); ?>" readonly />
            </div>
            <button type="submit" formaction="checkout.php">Checkout</button>
            <button type="button" onclick="window.location.href='add_book.php';">Continue Shopping</button>
            <button type="submit" formaction="remove_from_cart.php?book_id=<?php echo $book->id; ?>">Remove Book</button>
        </form>
    <?php endforeach; ?>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
