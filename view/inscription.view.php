<?php 
ob_start();
?>
<form method="POST" action="<?php echo URL ?>inscription" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="firstname" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="firstname" name="firstname">
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Nom</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Identifiant</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" class="form-control" id="email" name="email"></input>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input class="form-control-file" type="password" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Comfirmez votre mot de passe</label>
        <input class="form-control-file" type="password" id="confirmPassword" name="confirmPassword">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
<?php
$content = ob_get_clean();
$title = "Inscription";
require "template.php";
?>