<?php
//Démarre ma session
session_start();

//Import des ressources nécessaire
include './utils/functions.php';
include './model/model_users.php';
//Include de ma class ViewFooter
include './view/footer.php';

//Je crée l'objet ViewFooter
$footer = new ViewFooter();

//Création de mon objet ModelUser
$user = new ModelUser();

//DECLARATION DE MA VARIABLE D'AFFICHAGE
$message = '';

//Je vérifie si quelqu'un est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    //Je redirige vers l'accueil
    header('Location:controller_accueil.php');
    exit;
}

//ALGO : TRAITEMENT DU FORMULAIRE DE CONNEXION
//Vérifier la réception du formulaire
if(isset($_POST['submitConnexion'])){
    //Vérifie que les champs ne sont pas vides
    if(isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['password']) && !empty($_POST['password'])){
        //Vérifie que l'email est au bon format
        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //Nettoyage des données
            $email = sanitizeYoyo($_POST['email']);
            $password = sanitizeYoyo($_POST['password']);

            //J'enregistre les données dans mon objet
            $user->setEmail($email)->setPassword($password);

            //Je récupère les données utilisateur inscrit en BDD selon l'email entré
            $data = $user->readUserByMail();

            //Vérifie que j'ai un utilisateur
            if(!empty($data)){
                //Vérifie la correspondance des mots de passe
                if(password_verify($password,$data[0]['mdp_user'])){
                    //J'enregistre les infos en $_SESSION
                    $_SESSION['id'] = $data[0]['id_users'];
                    $_SESSION['name'] = $data[0]['name_user'];
                    $_SESSION['firstname'] = $data[0]['firstname_user'];
                    $_SESSION['email'] = $data[0]['email_user'];

                    //Rediriger vers la page de compte
                    header('Location:controller_compte.php');
                    exit;

                }else{
                    $message = "Email et/ou mot de passe incorrect !";
                }

            }else{
                $message = "Email et/ou mot de passe incorrect !";
            }

        }else{
            $message = "L'email n'est pas au bon format !";
        }

    }else{
        $message = "Veuillez remplir tous les champs !";
    }

}

//INCLUDE DE MES VUES
include './controller_header.php';
include './view/view_connexion.php';

//J'effectue le rendu de mon footer
echo $footer->render();

?>