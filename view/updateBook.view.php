<?php
// everything is after "ob_start" will be contained in the variable $content with "ob_get_clean"
ob_start();
?>

<form id="updateBook" method="POST" action="<?php echo URL ?>livres/updateBookValidation" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $book->getTitle() ?>">
    </div>
    <div class="mb-3">
        <label for="nbPages" class="form-label">Nombre de pages</label>
        <input type="number" class="form-control" id="nbPages" name="nbPages" value="<?php echo $book->getNbPages() ?>"></input>
    </div>
    <h3>Images: </h3>
    <img src="<?php echo URL ?>public/images/<?php echo $book->getImage() ?>" alt="<?php echo $book->getTitle(); ?>">
    <br><br>
    <div class="mb-3">
        <label for="formFile" class="form-label">Changer l'image</label>
        <input class="form-control-file" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="id" value="<?php echo $book->getId() ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$title = "Modification du livre: ".$book->getTitle();
require "template.php";

?>