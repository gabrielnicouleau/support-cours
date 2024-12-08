<?php
session_start();

include '../utils/functions.php';
include '../model/model_user.php';

if(isset($_POST["submitConnexion"])){

    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $password = sanitize($_POST['password']);
            $email = sanitize($_POST['email']);
            $bdd = connect();
            $result = controlMail($bdd,$email);
            if(!empty($result)){
                if(password_verify($password, $result['mdp_user'])){
                    $_SESSION['id'] = $result['id_user'];
                    $_SESSION['name'] = $result['name_user'];
                    $_SESSION['firstname'] = $result['firstname_user'];
                    $_SESSION['email'] = $result['email_user'];
                    header('Location:controller_compte_utilisateur.php');
                    exit;
                } else {
                    $message = "Login et/ou Mot de passe incorrect";
                }
            } else {
                $message = "Login et/ou Mot de passe incorrect";
            }
        }else{
            $message = "Votre Email n'est pas au bon format !";
        }
    }else{
        $message = "Veuillez remplir tous les champs obligatoires !";
    }
};



include '../view/header_view_acceuil.php';
include '../view/main_view_connexion.php';
include '../view/footer_view_acceuil.php';
?>