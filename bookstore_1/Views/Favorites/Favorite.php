<h2>Your Favorite Books</h2>
<ul>
    <?php foreach ($books as $book): ?>
        <li><?php echo htmlspecialchars($book->title); ?> by <?php echo htmlspecialchars($book->author); ?></li>
    <?php endforeach; ?>
</ul>