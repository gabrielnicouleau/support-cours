<?php
// lancement de la session
session_start();

// include de mon modèle et de mes fonctions utiles
include './utils/functions.php';
include './model/model_user.php';

//déclaration de ma variable d'affichage d'erreur
$message = '';

//algo: traitement du formulaire de connexion:

// vérifier la réception du formulaire de connexion
if(isset($_POST["submitConnexion"])){

    // vérifier que les champs obligatoires sont correctement remplis 
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){

        // vérifier le format du champ dédié à l'email
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            // nettoyage des données
            $password = sanitize($_POST['password']);
            $email = sanitize($_POST['email']);

            // création de l'objet de connexion à la BDD
            $bdd = connect();

            // vérifier la correspondance avec un mail enregistré en BDD
            $result = controlMail($bdd,$email);

            // vérifier que l'utilisateur existe en BDD
            if(!empty($result)){

                // vérifier que le mot de passe correspond à celui qui est chiffré en BDD
                if(password_verify($password, $result['mdp_user'])){

                    // enregistrement des données utiles de la BDD dans la session
                    $_SESSION['id'] = $result['id_users'];
                    $_SESSION['name'] = $result['name_user'];
                    $_SESSION['firstname'] = $result['firstname_user'];
                    $_SESSION['email'] = $result['email_user'];

                    // redirection vers la page acceuil
                    header('location:index.php');
                    exit;

                // message d'erreur en cas de mauvais mot de passe (même message que le précedent par sécurité)
                } else {
                    $message = "Email et/ou Mot de passe incorrect.";
                }

            // message d'erreur si le compte n'existe pas en BDD
            } else {
                $message = "Email et/ou Mot de passe incorrect.";
            }

        // message d'erreur si l'email n'est pas au bon format
        }else{
            $message = "Votre Email n'est pas au bon format.";
        }

    // message d'erreur si les champs obligatoires ne sont pas remplis
    }else{
        $message = "Veuillez remplir tous les champs obligatoires.";
    }
};

//include des vues
include './controller_header.php';
include './view/main_view_connexion.php';
include './view/footer_view_acceuil.php';
?>