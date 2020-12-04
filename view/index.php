<?php

if(empty($_GET['page'])){
    require "../view/main.view.php";
} else {
    switch($_GET['page']){
        case "accueil" : require "../view/main.view.php";
        break;
        case 'livres': require "../view/books.view.php";
        break;
    }
}

?>