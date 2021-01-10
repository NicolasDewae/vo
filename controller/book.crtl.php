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

    public function addBook(){
        require "view/addBook.view.php";
    }

    public function addBookValidation(){
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoute = $this->addImage($file,$repertoire);
        $this->bookManager->addBookDB($_POST['title'],$_POST['nbPages'],$nomImageAjoute);
        header('Location: '. URL . "livres");
    }

    private function addImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}