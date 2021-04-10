<?php
require_once "model/bookManager.class.php";
require_once "model/userManager.class.php";
require_once "js.crtl.php";

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
        $register = "public/images/";
        $userId = $_SESSION['id'];
        $NameImageAdded = $this->addImage($file, $register);
        $this->bookManager->addBookDB($userId,$_POST['title'],$_POST['nbPages'],$NameImageAdded);
        // Redirection
        header('Location: '. URL . "livres");
    }

    public function deleteBook($id){
        $imageName = $this->bookManager->getBookById($id)->getimage();
        // Delete image in the repository
        unlink("public/images/".$imageName);
        $this->bookManager->deleteBookDB($id);
        // Redirection
        header('Location: '. URL . "livres");
    }

    public function updateBook($id){
        $book = $this->bookManager->getBookById($id);
        require "view/updateBook.view.php";
    }

    public function updateBookValidation(){
        $currentImage = $this->bookManager->getBookById($_POST['id'])->getImage();
        $file = $_FILES['image'];
        $js = new JsController;

        if ($file['size'] > 0) {
            unlink("public/images/".$currentImage);
            $register = "public/images/";
            $NameImageAdded = $this->addImage($file, $register);
        } else {
            $NameImageAdded = $currentImage;
        }
        $this->bookManager->updateBookDB($_POST['id'], $_POST['title'], $_POST['nbPages'], $NameImageAdded);
        $js->successAlert();
        $js->redirection("livres");
        // header('Location: '. URL . "livres");
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