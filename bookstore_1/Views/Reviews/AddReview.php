<form action="add_review.php" method="post">
    <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book->id); ?>" />
    <div>
        <label for="review">Review</label>
        <textarea id="review" name="review_text" required></textarea>
    </div>
    <div>
        <label for="rating">Rating</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required />
    </div>
    <button type="submit">Submit Review</button>
</form>