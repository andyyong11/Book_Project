<?php
require_once '../Controller/CartController.php';

// Initialize the CartController
$cartController = new CartController();

// Get the book details from the form
$bookId = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$quantity = 1; // Default quantity to 1 for each add-to-cart action

// Debugging: Check the values
echo "<pre>";
var_dump([
    'bookId' => $bookId,
    'title' => $title,
    'author' => $author,
    'price' => $price,
]);
echo "</pre>";

// Adjust the validation to handle free items if needed
if ($bookId && $title && $author && ($price > 0 || $price === 0.0)) {
    // Pass all required arguments to addBookToCart
    $cartController->addBookToCart($bookId, $quantity, $title, $author, $price);
    // Redirect back to the shopping page after adding to cart
    header('Location: ../index.php'); // Adjust if your shopping page is in a different location
    exit();
} else {
    die("Invalid book details provided.");
}
