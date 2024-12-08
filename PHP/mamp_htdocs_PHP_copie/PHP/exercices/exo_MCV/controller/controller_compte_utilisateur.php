<?php
session_start();
include '../utils/functions.php';
include '../model/model_user.php.php';

if (!isset($_SESSION['id'])){
    header('Location: controller_accueil.php'); 
    exit; 
};
$message = "nom: {$_SESSION['firstname']}, prénom: {$_SESSION['name']}, email: {$_SESSION['email']}";
// $_SESSION['id'] = "id_users";

include '../view/header_view_acceuil.php';
include '../view/main_view_compte_utilisateur.php';
include '../view/footer_view_acceuil.php';
?>