<?php
//include la vue du header
include './view/viewHeader.php';
$header = new ViewHeader("<a href='controllerConnexion.php'>Connexion</a>");

//Je vérifie si quelqu'un est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $header->setNav("<a href='controllerCompteUtilisateur.php'>Mon Compte</a><a href='ControllerDeconnexion.php'>Déconnexion</a>");
}


echo $header->render();
?>