<?php
session_start();
class Cart {
    public function __construct() {
        // Ensure 'cart' is an array
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Add item to the cart
    public function addItem($id, $title, $author, $price, $quantity) {
        // Ensure the item in cart is an array or add it as new
        if (isset($_SESSION['cart'][$id]) && is_array($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$id] = [
                'title' => $title,
                'author' => $author,
                'price' => $price,
                'quantity' => $quantity
            ];
        }
    }

    // Get all items in the cart
    public function getItems() {
        return $_SESSION['cart'];
    }

    // Remove an item from the cart
    public function removeItem($id) {
        unset($_SESSION['cart'][$id]);
    }

    // Calculate the total
    public function getTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            if (is_array($item) && isset($item['price']) && isset($item['quantity'])) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
    public function getItemCount() {
        $count = 0;
        foreach ($_SESSION['cart'] as $item) {
            if (is_array($item) && isset($item['quantity'])) {
                $count += $item['quantity'];
            }
        }
        return $count;
    }
    
    
}

// If a POST request is made with book details, add the item to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
    $cart = new Cart();
    $cart->addItem(
        $_POST['book_id'],
        $_POST['title'],
        $_POST['author'],
        $_POST['price'],
        $_POST['quantity']
    );
    // Redirect back to the shopping page or cart page after adding
    header("Location: ../Views/Books/Shopping.php");
    exit;
}
?>
