<?php
require_once __DIR__ . '/../Model/Database.php';
require_once __DIR__ . '/../Model/Book.php';

class BooksController {
    private $bookModel;

    public function __construct() {
        // Instantiate the Database and connect to get the PDO instance
        $db = (new Database())->connect();
        
        // Pass the database connection to the Book model
        $this->bookModel = new Book($db);
    }

    // Method to list all books
    public function listBooks() {
        // Retrieve all books from the Book model
        $books = $this->bookModel->getBooks();
        
        // Debugging: Print the books array to ensure it's fetching data correctly
        if (!$books) {
            echo "No books were fetched from the database.";
            return [];
        }
        
        return $books;
    }

    // Method to view a specific book by its ID
    public function viewBook($book_id) {
        $book = $this->bookModel->getBookById($book_id);
        include '../Views/book_view.php';
    }

    // Method to add a new book
    public function addBook($data) {
        $this->bookModel->title = $data['title'];
        $this->bookModel->author = $data['author'];
        $this->bookModel->genre = $data['genre'];
        $this->bookModel->publication_year = $data['publication_year'];
        $this->bookModel->addBook();
        header("Location: books.php");
    }

    // Method to edit an existing book
    public function editBook($data) {
        $this->bookModel->id = $data['id'];
        $this->bookModel->title = $data['title'];
        $this->bookModel->author = $data['author'];
        $this->bookModel->genre = $data['genre'];
        $this->bookModel->publication_year = $data['publication_year'];
        $this->bookModel->updateBook();
        header("Location: books.php");
    }

    // Method to delete a book
    public function deleteBook($book_id) {
        $this->bookModel->deleteBook($book_id);
        header("Location: books.php");
    }
}
?>
