<?php
require_once "model/bookManager.class.php";

class BookController{
    private $bookManager;

    public function __construct(){
        $this->bookManager = new BookManager;
        $this->bookManager->loadingBooks();
    }

    public function showBooks(){
        $books = $this->bookManager->getBooks();
        require "view/books.view.php";
    }

    public function showBook($id){
        $book = $this->bookManager->getBookById($id);
        require "view/showBook.view.php";
    }
}