<?php
class Cart {
    public function addItem($book, $quantity = 1) {
        $bookId = $book->id;
        if (isset($_SESSION['cart'][$bookId])) {
            $_SESSION['cart'][$bookId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$bookId] = [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'price' => $book->price,
                'quantity' => $quantity
            ];
        }
    }

    public function removeItem($bookId) {
        unset($_SESSION['cart'][$bookId]);
    }

    public function updateQuantity($bookId, $quantity) {
        if ($quantity > 0) {
            $_SESSION['cart'][$bookId]['quantity'] = $quantity;
        } else {
            $this->removeItem($bookId);
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
