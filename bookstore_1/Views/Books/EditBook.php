<form action="edit_book.php" method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($book['id']); ?>" />
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required />
    </div>
    <div>
        <label for="author">Author</label>
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required />
    </div>
    <div>
        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($book['genre']); ?>" required />
    </div>
    <div>
        <label for="publication_year">Publication Year</label>
        <input type="number" id="publication_year" name="publication_year" value="<?php echo htmlspecialchars($book['publication_year']); ?>" required />
    </div>
    <button type="submit">Save Changes</button>
</form>