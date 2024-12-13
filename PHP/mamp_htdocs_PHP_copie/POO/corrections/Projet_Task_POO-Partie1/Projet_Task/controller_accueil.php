<?php
/*****************************
 * MON CONTROLLER DE L'ACCUEIL
******************************/
//Démarer la session
session_start();

//IMPORT DES RESSOURCES
//Include de mon fichier de fonctions utilitaires
include './utils/functions.php';
//Include de mon modèle
include './model/model_users.php';

//Création mon objet ModelUser
$user = new ModelUSer();

//DECLARATION DES VARIABLES D'AFFICHAGES
$message = '';
$listeUsers = '';

///////////////////////////////
//INSCRIPTION D'UN UTILISATEUR
///////////////////////////////

//Vérifier que je reçois le formulaire d'incription
if(isset($_POST['submitInscription'])){
    //Vérifie que les données ne sont pas vides
    if(isset($_POST['name']) && !empty($_POST['name'])
    && isset($_POST['firstname']) && !empty($_POST['firstname'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['password']) && !empty($_POST['password'])
    && isset($_POST['passwordVerify']) && !empty($_POST['passwordVerify'])){

            //Vérifier que le mail est au bon format
            if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){

                    //Vérifie que les 2 mots de passe correspondent
                    if($_POST['password'] === $_POST['passwordVerify']){

                            //Nettoyage des données
                            $name = sanitizeYoyo($_POST['name']);
                            $firstname = sanitizeYoyo($_POST['firstname']);
                            $email = sanitizeYoyo($_POST['email']);
                            $password = sanitizeYoyo($_POST['password']);
                            $passwordVerify = sanitizeYoyo($_POST['passwordVerify']);

                            //Hasher le mot de passe
                            $password = password_hash($password, PASSWORD_BCRYPT);

                            //J'enregistre les données au sein de mon objet
                            $user->setName($name)->setFirstname($firstname)->setEmail($email)->setPassword($password);

                            //Vérifier si l'utilisateur est déjà enregistré ou pas en BDD
                            $data = $user->readUserByMail();

                            //Vérifie si $data est vide, pour savoir si l'email est disponible à l'enregistrement
                            if(empty($data)){
                                        
                                //On commence à enregistrer le compte, car l'email est disponible
                                $message = $user->createUser();

                            }else{
                                $message = "Cet email est déjà utilisé par un autre compte !";
                            }

                    }else{
                        $message = "Vos deux mots de passe ne correspondent pas !";
                    }

            }else{
                $message = "Votre email n'est pas au bon format !";
            }

    }else{
        $message = "Veuillez remplir tous les champs !";
    }
}

///////////////////////////////
//AFFICHAGE DES UTILISATEURS
///////////////////////////////

//Récupération des utilisateurs en BDD
//Je lance la fonction pour récupérer les données de mes utilisateurs
$data = $user->readUsers();

//Je parcours mon tableau de donné $data, pour générer l'affichage de chaque utilisateur
foreach($data as $user){
    $listeUsers = $listeUsers."<li>{$user['firstname_user']} {$user['name_user']} : {$user['email_user']}</li>";
}

//INCLUDE DE MON AFFICHAGE
include './controller_header.php';
include './view/view_accueil.php';
include './view/footer.php';
?>