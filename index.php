<?php
// change url
// str_replace for replace index.php with nothing ("index.php", "")
// isset for test if is https or http website
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controller/book.crtl.php";
require_once "controller/user.crtl.php";
$bookController = new BookController;
$userController = new UserController;

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
                    $bookController->showBook($url[2]);
                }elseif ($url[1] === "addBook") {
                    $bookController->addBook();
                }elseif ($url[1] === "updateBook") {
                    $bookController->updateBook($url[2]);
                }elseif ($url[1] === "updateBookValidation") {
                    $bookController->updateBookValidation();
                }elseif ($url[1] === "deleteBook") {
                    $bookController->deleteBook($url[2]);
                }elseif ($url[1] === "addBookValidation") {
                    $bookController->addBookValidation();
                }else {
                    throw new Exception("La page que vous recherchez n'existe pas");  
                }
                break;
                case "inscription": 
                    if (empty($url[1])) {
                        require "view/inscription.view.php";
                    }elseif ($url[1] === "SignUp") {
                        $userController->SignUp();
                    }
                break;
                case "todo" : require "view/todo.view.php";
                break;
                default : throw new Exception("La page que vous recherchez n'existe pas");    
        }
    }
}catch(Exception $e){
    $msg = $e->getMessage();
    require "view/error.view.php";
}


?>