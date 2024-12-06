<?php
//controller de ma page principale

// include de functions.php et model_acceuil.php
include '../utils/functions.php';
include '../model/model_user.php';

// creation des variables utilisées dans ce fichier
$message = "";
$listeUsers = "";
$title = "Ma super page";

// vérification de la validation du bouton submit
if(isset($_POST["submitInscription"])){

    // vérification que les champs obligatoires aient été bien remplis
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['firstName']) && !empty($_POST['firstName']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordValid']) && !empty($_POST['passwordValid'])){ // nettoyage du deuxième champ de mot de passe pour prévenir les injections SQL

        // vérification de la validité de l'email au bon format
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            // vérification du mot de passe identique dans les deux champs indiqués
            if($_POST['password'] === $_POST['passwordValid']){

                // Nettoyage des données récoltées
                $name = sanitize($_POST['name']);
                $firstname = sanitize($_POST['firstName']);
                $password = sanitize($_POST['password']);
                $email = sanitize($_POST['email']);
                $passwordVerify = sanitize($_POST['passewordValid']);

                // Chiffrage des données sensibles (ici le mot de passe)
                $password = password_hash($password,PASSWORD_BCRYPT);

                // instance de connexion à la BDD
                $bdd = connect();

                // vérification que le mail n'ai pas déja été utilisé avec un autre compte
                $result = controlMail($bdd,$email);

                // Si l'email est valide
                if(empty($result)){

                    // Enregistrement de l'utilisateur en BDD
                    $message = addUser($bdd,$name,$firstname,$password,$email);

                // Si l'email est déja utilisé
                } else{
                    $message = "Cet Email est déja utilisé par un autre compte.";
                }

            // Si les 2 MDP ne sont pas identiques
            }else{
                $message = "Vos 2 mots de passe ne sont pas identiques";
            }

        // Si l'email n'est pas au bon format
        }else{
            $message = "Votre Email n'est pas au bon format !";
        }

    // Si tous les champs obligatoires ne sont pas remplis
    }else{
        $message = "Veuillez remplir tous les champs obligatoires !";
    }
};

// instance de connection à la BDD
$bdd = connect();

// Affichage de la liste des utilisateurs enregistrés
$listeUsers = listeUsers($bdd);

// include des fichiers view utilisés
include '../view/header_view_acceuil.php';
include '../view/main_view_acceuil.php';
include '../view/footer_view_acceuil.php';

?>