<?php
//include la vue du header
include './view/header.php';
$header = new ViewHeader("<a href='controller_connexion.php'>Connexion</a>");

//Je vérifie si quelqu'un est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $header->setNav("<a href='controller_compte.php'>Mon Compte</a><a href='deconnexion.php'>Déconnexion</a>");
}


echo $header->render();
?>