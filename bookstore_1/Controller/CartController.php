<?php
class CartController {
    public function addBookToCart($bookId, $quantity, $title, $author, $price) {
        // Ensure the cart session variable is an array
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the book already exists in the cart
        if (isset($_SESSION['cart'][$bookId])) {
            // If the book is already in the cart, increase the quantity
            $_SESSION['cart'][$bookId]['quantity'] += $quantity;
        } else {
            // If the book is not in the cart, add it as a new entry
            $_SESSION['cart'][$bookId] = [
                'id' => $bookId,
                'title' => $title,
                'author' => $author,
                'price' => $price,
                'quantity' => $quantity,
            ];
        }
    }

    public function removeBookFromCart($bookId) {
        // Ensure the cart session variable is an array
        if (isset($_SESSION['cart'][$bookId])) {
            unset($_SESSION['cart'][$bookId]);
        }
    }

    public function clearCart() {
        unset($_SESSION['cart']);
    }

    public function getCartItems() {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }
}
