<?php
// everything is after "ob_start" will be contained in the variable $content with "ob_get_clean"
ob_start();
?>



<?php
$content = ob_get_clean();
$title = "Page d'accueil";
require "../view/template.php";
?>