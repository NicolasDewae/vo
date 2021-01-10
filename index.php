<?php
// change url
// str_replace for replace index.php with nothing ("index.php", "")
// isset for test if is https or http website
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controller/book.crtl.php";
$bookController = new BookController;

try{
    if(empty($_GET['page'])){
        require "view/main.view.php";
    } else {
        // Explode url with /
        // The FILTER_SANITIZE_URL filter removes all illegal URL characters from a string.
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    
        switch($url[0]){
            case "accueil" : require "view/main.view.php";
            break;
            case 'livres': 
                if (empty($url[1])) {
                    $bookController->showBooks();
                } elseif ($url[1] === "showBook") {
                    echo $bookController->showBook($url[2]);
                }elseif ($url[1] === "addBook") {
                    echo $bookController->addBook();
                }elseif ($url[1] === "modifyBook") {
                    echo "Modifier un livre";
                }elseif ($url[1] === "deleteBook") {
                    $bookController->deleteBook($url[2]);
                }elseif ($url[1] === "addBookValidation") {
                    $bookController->addBookValidation();
                }else {
                    throw new Exception("page do not exist");
                    
                }
                break;
                default : throw new Exception("page do not exist");
                
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
}


?>