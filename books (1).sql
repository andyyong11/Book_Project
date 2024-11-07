-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2024 at 04:36 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `publication_year` year NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `publication_year`, `price`) VALUES
(1, '1984', 'George Orwell', 'Dystopian Fiction', '1949', 12.99),
(2, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', '1960', 13.50),
(3, 'Pride and Prejudice', 'Jane Austen', 'Romantic Fiction', '0000', 9.99),
(4, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Classic Fiction', '1925', 10.99),
(5, 'Moby-Dick', 'Herman Melville', 'Adventure Fiction', '0000', 11.50),
(6, 'War and Peace', 'Leo Tolstoy', 'Historical Fiction', '0000', 14.99),
(7, 'The Catcher in the Rye', 'J.D. Salinger', 'Modern Classic', '1951', 8.99),
(8, 'The Hobbit', 'J.R.R. Tolkien', 'Fantasy Fiction', '1937', 12.75),
(9, 'Brave New World', 'Aldous Huxley', 'Dystopian Fiction', '1932', 10.50),
(10, 'To the Lighthouse', 'Virginia Woolf', 'Modern Fiction', '1927', 9.25),
(11, 'The Odyssey', 'Homer', 'Epic Poetry', '0000', 13.99),
(12, 'Frankenstein', 'Mary Shelley', 'Gothic Fiction', '0000', 7.99);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
