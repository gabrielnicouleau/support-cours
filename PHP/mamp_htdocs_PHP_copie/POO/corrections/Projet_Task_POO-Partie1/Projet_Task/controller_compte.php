<?php
//Démarer la session
session_start();

//Déclaration des variables d'affichages
$prenom = "";
$nom = "";
$email = "";

//vérifier que quelqu'un est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $prenom = $_SESSION['firstname'];
    $nom = $_SESSION['name'];
    $email = $_SESSION['email'];
}else{
    //si je ne suis pas connecté, je redirige vers la page d'accueil
    header('Location:controller_accueil.php');
    exit;
}

//include des vues
include './controller_header.php';
include './view/view_compte.php';
include './view/footer.php';
?>