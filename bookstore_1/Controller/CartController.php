<?php
session_start();

class CartController {
    // Adds a book to the cart
    public function addToCart($book, $quantity) {
        // Initialize the cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the book is already in the cart
        $bookId = $book->id;
        if (isset($_SESSION['cart'][$bookId])) {
            // If the book is already in the cart, update the quantity
            $_SESSION['cart'][$bookId]['quantity'] += $quantity;
        } else {
            // Add new item to the cart
            $_SESSION['cart'][$bookId] = [
                'book' => $book,
                'quantity' => $quantity
            ];
        }
    }

    // Retrieves all items in the cart
    public function getCartItems() {
        return $_SESSION['cart'] ?? [];
    }

    // Removes a book from the cart
    public function removeFromCart($bookId) {
        if (isset($_SESSION['cart'][$bookId])) {
            unset($_SESSION['cart'][$bookId]);
        }
    }

    // Clears the entire cart
    public function clearCart() {
        unset($_SESSION['cart']);
    }
}
?>
