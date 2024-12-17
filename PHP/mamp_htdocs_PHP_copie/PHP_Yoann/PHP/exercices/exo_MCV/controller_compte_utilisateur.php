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
include './controller_header.php';
include './view/main_view_compte_utilisateur.php';
include './view/footer_view_acceuil.php';
?>