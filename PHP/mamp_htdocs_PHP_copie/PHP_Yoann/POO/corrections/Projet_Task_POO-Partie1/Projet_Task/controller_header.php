<?php
//Déclarer la variable d'affichage
$nav = "<a href='controller_connexion.php'>Connexion</a>";

//Je vérifie si quelqu'un est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $nav="<a href='controller_compte.php'>Mon Compte</a><a href='deconnexion.php'>Déconnexion</a>";
}

//include la vue du header
include './view/header.php';
?>