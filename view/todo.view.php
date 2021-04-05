<?php
ob_start();
?>
<h2>Mises à jours principales</h2>
<ol>
    <li>Verifier les acces des users (connectés) et des visiteurs (non connectés)</li>
    <li>modifier les fonctions show, modify et delete book pour y ajouter l'id user</li>
    <li>Implémenter du JS pour dynamiser l'application pour:</li>
    <ul>
        <li>Ajouter des alertes de succès et/ou d'erreurs</li>
        <li>Personnaliser les alertes lors des suppressions de livres </li>
    </ul>
</ol>

<h2>Mises à jours secondaires:</h2>
<ol>
    <li>Ajouter une page d'accueil grand publique avec explication de l'application</li>
    <li>Ajouter une page d'accueil pour les recruteurs avec lien LinkedIn, github et explication technique du projet</li>
    <li>Réaliser l'ajout des livres via une bibliotheque appelée à l'aide d'une API</li>
    <li>Donner la possibilité de trier ses livres en sous catégories à l'aide de Navs bootstrap:</li>
        <ul>
            <li>J'ai</li>
            <li>Je veux</li>
            <li>Je souhaite</li>
            <li>J'échange (Dans le cas futur ou l'on met en place un système de profil public avec un messagerie)</li>
        </ul>
    <li>Ajouter de la lecture de texte anglophone avec traduction des mots au clic</li>
</ol>


<?php
$content = ob_get_clean();
$title = "To do";
require "template.php";
?>