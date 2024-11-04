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
        return $stmt; // Returns a list of all books
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
}

function get_Books($book_id) {
    global $db;
    $query = 'SELECT * FROM books
              WHERE id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $book = $statement->fetch();
    $statement->closeCursor();
    return $book;
}

function delete_Books($book_id) {
    global $db;
    $query = 'DELETE FROM books
              WHERE id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($book_id, $book_title, $author_name, $book_genre, $book_publication_year) {
    global $db;
    $query = 'INSERT INTO books
                 (id, title, author, genre, publication_year)
              VALUES
                 (:book_id, :book_title, :author_name, :book_genre, :book_publication_year)';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->bindValue(':book_title', $book_title);
    $statement->bindValue(':author_name', $author_name);
    $statement->bindValue(':book_genre', $book_genre);
    $statement->bindValue(':book_publication_year', $book_publication_year);
    $statement->execute();
    $statement->closeCursor();
}
?>