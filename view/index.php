<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "../model/bookManager.class.php";
$bookManager = new BookManager;

try{
    if(empty($_GET['page'])){
        require "../view/main.view.php";
    } else {
        // url formatage
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    
        switch($url[0]){
            case "accueil" : require "../view/main.view.php";
            break;
            case 'livres': 
                if (empty($url[1])) {
                    require "../view/books.view.php";
                    $bookManager->loadingBooks();
                } elseif ($url[1] === "showBook") {
                    require "../view/showBook.view.php";
                    echo $bookManager->showBook($url[2]);
                }elseif ($url[1] === "addBook") {
                    echo "Ajouter un livre";
                }elseif ($url[1] === "modifyBook") {
                    echo "Modifier un livre";
                }elseif ($url[1] === "deleteBook") {
                    echo "Supprimer un livre";
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