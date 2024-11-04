<?php

require_once __DIR__ . '/../Controller/CartController.php';



// Get form data
$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$publication_year = $_POST['publication_year'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

// Create a book object (this can also be an associative array if simpler)
$book = (object) [
    'id' => uniqid(), // Unique ID for the book (could be replaced by database ID if available)
    'title' => $title,
    'author' => $author,
    'genre' => $genre,
    'publication_year' => $publication_year,
    'price' => $price
];

// Initialize CartController and add book to cart
$cartController = new CartController();
$cartController->addToCart($book, $quantity);

// Redirect to cart or a confirmation page
header("Location: cart.php");
exit();
