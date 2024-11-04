<?php
class Database {
    private $dsn = 'mysql:host=localhost;dbname=book_review';
    private $username = 'root';
    private $password = '';
    private $db;

    public function connect() {
        try {
            $this->db = new PDO($this->dsn, $this->username, $this->password);
            return $this->db;
        } catch (PDOException $e) {
            // Display error message inline
            echo "<p>Database connection error: " . htmlspecialchars($e->getMessage()) . "</p>";
            exit(); // Stop further execution if there’s a connection error
        }
    }
}
?>
