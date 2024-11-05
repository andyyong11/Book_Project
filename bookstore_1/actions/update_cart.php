<?php
require_once '../Controller/CartController.php';

$cartController = new CartController();
$quantities = filter_input(INPUT_POST, 'quantities', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$cartController->updateCart($quantities);
?>