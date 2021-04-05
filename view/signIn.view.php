<?php 
ob_start();
?>
<form method="POST" action="<?php echo URL ?>connexion/SignIn" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" class="form-control" id="email" name="emailConnect"></input>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input class="form-control-file" type="password" id="password" name="passwordConnect">
    </div>
    <button type="submit" class="btn btn-primary">Connexion</button>
</form>
<?php
$content = ob_get_clean();
$title = "Connexion";
require "template.php";
?>