<?php
    require_once "model/books.class.php";
    require_once "model/bookManager.class.php";
    require_once "model/userManager.class.php";

    $userManager = new UserManager;
    $userManager->user_only();
    
    $bookManager = new BookManager;
    $bookManager->loadingBooks();

    // everything is after "ob_start" will be contained in the variable $content with "ob_get_clean"
    ob_start();
    // if there are not book add "Ajouter votre premier livre" button
    if (!$books) {
?>
    <a href="<?php echo URL ?>livres/addBook" class="btn btn-success d-block">Ajoutez votre premier livre</a>
<?php
    } else {
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
            <td class="align-middle"><img src="public/images/<?php echo $books[$i]->getImage()?>" width="60px;" alt="Livre <?php echo $books[$i]->getTitle()?>"></td>
            <td class="align-middle"><a href="<?php echo URL ?>livres/showBook/<?php echo $books[$i]->getId()?>"><?php echo $books[$i]->getTitle()?></a></td>
            <td class="align-middle"><?php echo $books[$i]->getNbPages()?></td>
            <td class="align-middle"><a href="<?php echo URL ?>livres/updateBook/<?php echo $books[$i]->getId()?>" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle">
                <form method="POST" action="<?php echo URL ?>livres/deleteBook/<?php echo $books[$i]->getId()?>" onSubmit="return confirm('Voulez-vous vraiment supprimer ?');">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <!-- end for -->
        <?php } ?>
</table>
        <!-- if there are books, add "Ajouter" button -->  
        <a href="<?php echo URL ?>livres/addBook" class="btn btn-success d-block">Ajouter</a>
    <!-- end if -->
    <?php } ?>
 
<?php
$content = ob_get_clean();
$title = "Livres de la bibliothèque";
require "template.php";
?>