<?php
// Book model to handle CRUD operations related to books
class Book {
    private $conn;
    private $table = 'books';

    // Book properties
    public $id;
    public $title;
    public $author;
    public $genre;
    public $publication_year;

    // Constructor with database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Retrieve all books from the database
    public function getBooks() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all books as an associative array
    }

    // Retrieve a specific book by ID
    public function getBookById($book_id) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :book_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single book as an associative array
    }

    // Add a new book to the database
    public function addBook() {
        $query = 'INSERT INTO ' . $this->table . ' (title, author, genre, publication_year) VALUES (:title, :author, :genre, :publication_year)';
        $stmt = $this->conn->prepare($query);

        // Bind parameters to prevent SQL injection
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':genre', $this->genre);
        $stmt->bindParam(':publication_year', $this->publication_year);

        return $stmt->execute(); // Returns true if the book was added successfully
    }

    // Update an existing book in the database
    public function updateBook() {
        $query = 'UPDATE ' . $this->table . ' SET title = :title, author = :author, genre = :genre, publication_year = :publication_year WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':genre', $this->genre);
        $stmt->bindParam(':publication_year', $this->publication_year);

        return $stmt->execute(); // Returns true if the book was updated successfully
    }

    // Delete a book from the database
    public function deleteBook($book_id) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :book_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        return $stmt->execute(); // Returns true if the book was deleted successfully
    }
}
?>
