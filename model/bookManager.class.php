<?php
require_once "DbConnection.class.php";
require_once "books.class.php";

    class BookManager extends dbConnection {
        private $_books; // Book tab
        
        public function addBook($book){
            $this->_books[] = $book;
        }

        public function getBooks(){
            return $this->_books;
        }

        public function loadingBooks(){
            $req = $this->getInstance()->prepare("SELECT * FROM books");
            $req->execute();
            $books = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();

            foreach($books as $book){
                $b = new Book($book['id'], $book['title'],$book['nbPages'],$book['image']);
                $this->addBook($b);
            }
        }

        public function getBookById($id){
            for ($i=0; $i < count($this->_books); $i++) { 
                if ($this->_books[$i]->getId() === $id) {
                    return $this->_books[$i];
                }
            }
        }
    }
?>