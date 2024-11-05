<?php
require_once '../Controller/CartController.php';

$cartController = new CartController();
$bookId = filter_input(INPUT_GET, 'book_id', FILTER_VALIDATE_INT);
$cartController->removeBookFromCart($bookId);
?>