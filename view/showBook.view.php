<?php
 
ob_start(); 

?>

<div class="row">
    <div class="col-6">
        <img src="<?php echo URL ?>public/images/<?= $book->getImage(); ?>">
    </div>
    <div class="col-6">
        <p>Titre : <?php echo $book->getTitle(); ?></p>
        <p>Nombre de pages : <?php echo $book->getNbPages(); ?></p>
    </div>
</div>

<?php

$content = ob_get_clean();
$title = $book->getTitle();
require "template.php";

?>