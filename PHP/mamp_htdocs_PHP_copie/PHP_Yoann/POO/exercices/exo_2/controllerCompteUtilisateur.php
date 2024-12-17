<?php

// lancement de la session
session_start();

//déclaration des variables d'affichage
$compteUtilisateur = '';

// vérifier que quelqu'un est connecté
if (isset($_SESSION['id']) && !empty($_SESSION['id'])){

    //afficher les données de l'utilisateur
    $compteUtilisateur = "nom: {$_SESSION['firstname']}, prénom: {$_SESSION['name']}, email: {$_SESSION['email']}";
};

// include des vues
include './controllerHeader.php';
include './view/viewCompteUtilisateur.php';
include './view/viewFooter.php';

$footerview = new ViewFooter(); 
echo $footerview->render();
?>