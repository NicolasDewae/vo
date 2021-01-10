<?php 
ob_start();
?>
<form method="POST" action="<?php echo URL ?>livres/addBookValidation" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="email@example.com">
    </div>
    <div class="mb-3">
        <label for="nbPages" class="form-label">Nombre de pages</label>
        <input type="number" class="form-control" id="nbPages" name="nbPages"></input>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">importer une image</label>
        <input class="form-control-file" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php 
$content = ob_get_clean();
$title = "Ajouter un livre";
require "template.php";
?>