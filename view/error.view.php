<?php
ob_start();
?>

<?php echo $msg ?>

<?php
$content = ob_get_clean();
$title = "Erreur";
require "template.php";
?>