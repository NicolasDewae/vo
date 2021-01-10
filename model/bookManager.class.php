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
            // avoid having duplicates
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

        public function addBookDB($title,$nbPages,$image){
            $req = "INSERT INTO books (title, nbPages, image)
                    values (:title, :nbPages, :image)";
            $stmt = $this->getInstance()->prepare($req);
            $stmt->bindValue(":title",$title,PDO::PARAM_STR);
            $stmt->bindValue(":nbPages",$nbPages,PDO::PARAM_INT);
            $stmt->bindValue(":image",$image,PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
    
            if($resultat > 0){
                $book = new Book($this->getInstance()->lastInsertId(),$title,$nbPages,$image);
                $this->addBook($book);
            }        
        }

        public function updateBookDB($id, $title, $nbPages, $image){
            $req = "UPDATE books 
                    SET title = :title, nbPages = :nbPages, image = :image
                    WHERE id = :id";
            $stmt = $this->getInstance()->prepare($req);
            $stmt->bindvalue(":id",$id,PDO::PARAM_INT);
            $stmt->bindValue(":title",$title,PDO::PARAM_STR);
            $stmt->bindValue(":nbPages",$nbPages,PDO::PARAM_INT);
            $stmt->bindValue(":image",$image,PDO::PARAM_STR);
            $resultat = $stmt->execute();
            $stmt->closeCursor();

            if ($resultat > 0) {
                $this->getBookById($id)->setTitle($title);
                $this->getBookById($id)->setNbPages($nbPages);
                $this->getBookById($id)->setImage($image);
            }
        }

        public function deleteBookDB($id){
            $req = "DELETE FROM books WHERE id = :idBook";
            $stmt = $this->getInstance()->prepare($req);
            $stmt->bindValue("idBook", $id, PDO::PARAM_INT);
            $resultat = $stmt->execute();
            $stmt->closeCursor();
            if ($resultat > 0) {
                $bookToDelete = $this->getBookById($id); 
                unset($bookToDelete);
            }
        }
    }
?>