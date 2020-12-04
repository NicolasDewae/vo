<?php
require_once "../model/books.class.php";
require_once "../model/bookManager.class.php";

$bookManager = new BookManager;

$bookManager->loadingBooks();

// everything is after "ob_start" will be contained in the variable $content with "ob_get_clean"
ob_start();
?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
        // get all books and store them in $books
        $books = $bookManager->getBooks(); 
        for ($i=0; $i < count($books); $i++) { 
    ?>
            <tr>
                <td class="align-middle"><img src="../Projet/Vo/public/images/<?php echo $books[$i]->getImage()?>" width="60px;" alt="Jouer au fantomes"></td>
                <td class="align-middle"><?php echo $books[$i]->getTitle()?></td>
                <td class="align-middle"><?php echo $books[$i]->getNbPages()?></td>
                <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
                <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
            </tr>
        <?php } ?>
</table>
<a href="" class="btn btn-success d-block">Ajouter</a>
 
<?php
$content = ob_get_clean();
$title = "Livres de la bibliothèque";
require "../view/template.php";
?>