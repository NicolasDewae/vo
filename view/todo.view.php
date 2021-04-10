<?php
ob_start();
?>
<h2>Mises à jours principales</h2>
<ol>
    <li>Implémenter du JS pour dynamiser l'application pour:</li>
    <ul>
        <li>Ajouter des alertes de succès et/ou d'erreurs</li>
        <li>Personnaliser les alertes lors des suppressions de livres </li>
    </ul>
    <li>Donner la possibilité de trier ses livres en sous catégories à l'aide de Navs bootstrap:</li>
    <ul>
        <li>J'aime</li>
        <li>Je n'aime pas</li>
    </ul>
    <li>Ajouter un champ "note" dans showBook.view.php</li>

</ol>

<h2>Mises à jours secondaires:</h2>
<ol>
    <li>Ajouter une page d'accueil grand publique avec explication de l'application</li>
    <li>Ajouter une page d'accueil pour les recruteurs avec lien LinkedIn, github et explication technique du projet</li>
    <li>Réaliser l'ajout des livres via une bibliotheque appelée à l'aide d'une API</li>
    <li>Ajouter de la lecture de texte anglophone avec traduction des mots au clic</li>
</ol>


<?php
$content = ob_get_clean();
$title = "To do";
require "template.php";
?>