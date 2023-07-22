<?php
interface IBook {
    public function getTitle();
    public function getAuthor();
    public function getPublisher();
    public function getYearPublished();
    public function getISBN();
    public function getChapters();
  }
  class Book implements IBook {
    private $title;
    private $author;
    private $publisher;
    private $yearPublished;
    private $ISBN;
    private $chapters;
  
    public function __construct($title, $author, $publisher, $yearPublished, $ISBN, $chapters) {
      $this->title = $title;
      $this->author = $author;
      $this->publisher = $publisher;
      $this->yearPublished = $yearPublished;
      $this->ISBN = $ISBN;
      $this->chapters = $chapters;
    }
  
    public function getTitle() {
      return $this->title;
    }
  
    public function getAuthor() {
      return $this->author;
    }
  
    public function getPublisher() {
      return $this->publisher;
    }
  
    public function getYearPublished() {
      return $this->yearPublished;
    }
  
    public function getISBN() {
      return $this->ISBN;
    }
  
    public function getChapters() {
      return $this->chapters;
    }
  }
  class BookList {
    private $books = array();
  
    public function addBook($book) {
      $this->books[] = $book;
    }
  
    public function sortBooksByAuthor() {
      usort($this->books, function($book1, $book2) {
        return strcmp($book1->getAuthor(), $book2->getAuthor());
      });
    }
  
    public function sortBooksByTitle() {
      usort($this->books, function($book1, $book2) {
        return strcmp($book1->getTitle(), $book2->getTitle());
      });
    }
  
    public function sortBooksByYearPublished() {
      usort($this->books, function($book1, $book2) {
        return $book1->getYearPublished() - $book2->getYearPublished();
      });
    }
  
    public function getBooks() {
      return $this->books;
    }
}
$bookList = new BookList();

$bookList->addBook(new Book('Book 1', 'TG1', 'NXB1', 2020, '123456789', array('Chapter 1', 'Chapter 2', 'Chapter 3')));
$bookList->addBook(new Book('Book 3', 'TG2', 'NXB2', 2021, '987654321', array('Chapter 1', 'Chapter 2', 'Chapter 3')));
$bookList->addBook(new Book('Book 2', 'TG3', 'NXB3', 2022, '246801357', array('Chapter 1', 'Chapter 2', 'Chapter 3')));

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $publisher = $_POST['publisher'];
  $yearPublished = $_POST['yearPublished'];
  $ISBN = $_POST['ISBN'];
  $chapters = explode(',', $_POST['chapters']);

  $bookList->addBook(new Book($title, $author, $publisher, $yearPublished, $ISBN, $chapters));
}

if (isset($_GET['sort'])) {
  switch ($_GET['sort']) {
    case 'author':
      $bookList->sortBooksByAuthor();
      break;
    case 'title':
      $bookList->sortBooksByTitle();
      break;
    case 'yearPublished':
      $bookList->sortBooksByYearPublished();
      break;
  }
}

echo '<table>';
echo '<tr><th>Title</th><th>Author</th><th>Publisher</th><th>Year Published</th><th>ISBN</</th><th>Chapters</th></tr>';

foreach ($bookList->getBooks() as $book) {
  echo '<tr>';
  echo '<td>' . $book->getTitle() . '</td>';
  echo '<td>' . $book->getAuthor() . '</td>';
  echo '<td>' . $book->getPublisher() . '</td>';
  echo '<td>' . $book->getYearPublished() . '</td>';
  echo '<td>' . $book->getISBN() . '</td>';
  echo '<td>' . implode(', ', $book->getChapters()) . '</td>';
  echo '</tr>';
}

echo '</table>';

echo '<h2>Add a new book</h2>';
echo '<form method="post">';
echo '<label for="title">Title:</label><br>';
echo '<input type="text" id="title" name="title"><br>';
echo '<label for="author">Author:</label><br>';
echo '<input type="text" id="author" name="author"><br>';
echo '<label for="publisher">Publisher:</label><br>';
echo '<input type="text" id="publisher" name="publisher"><br>';
echo '<label for="yearPublished">Year Published:</label><br>';
echo '<input type="number" id="yearPublished" name="yearPublished"><br>';
echo '<label for="ISBN">ISBN:</label><br>';
echo '<input type="text" id="ISBN" name="ISBN"><br>';
echo '<label for="chapters">Chapters:</label><br>';
echo '<input type="text" id="chapters" name="chapters"><br>';
echo '<input type="submit" name="submit" value="Add Book">';
echo '</form>';

echo '<h2>Sort by:</h2>';
echo '<a href="?sort=author">Author</a> | ';
echo '<a href="?sort=title">Title</a> | ';
echo '<a href="?sort=yearPublished">Year Published</a>';
?>