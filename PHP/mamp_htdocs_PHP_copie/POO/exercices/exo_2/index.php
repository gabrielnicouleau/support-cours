<?php

session_start();

include './model/ModelUser.php';
// include de mes classes
include './view/viewAcceuil.php';
include './view/viewFooter.php';


//création des objets utilisés
$user = new ModelUser($name,$firstname,$email,$password,$id);
$acceuil = new ViewAccueil(); 
$footerview = new ViewFooter(); 


function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

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

                $user->setName($name)->setFirstname($firstname)->setEmail($email)->setPassword($password);

                //adaptation au model
                $data = $user->readUserByMail();
                if(empty($data)){
                    $acceuil->setMessage( $user->createUser());
                // si le mail est déja utilisé par un autre utilisateur
                } else{
                    $acceuil->setMessage("ce mail est déja utilisé par un autre compte");
                }

            // Si les 2 MDP ne sont pas identiques
            }else{
                $acceuil->setMessage("Vos 2 mots de passe ne sont pas identiques");
            }
        // Si l'email n'est pas au bon format
        }else{
            $acceuil->setMessage("Votre Email n'est pas au bon format !");
        }
    // Si tous les champs obligatoires ne sont pas remplis
    }else{
        $acceuil->setMessage("Veuillez remplir tous les champs obligatoires !");
    }
};

$data = $user->readUsers();
foreach($data as $element){
    $listUsers = $listUsers.$acceuil->cardUser($element);
};

// $acceuil->setListUsers($listUsers); ne fonctionne pas


//affichage
//intégration du controller du header qui affiche directement le header
include './controllerHeader.php';

//affichage du rendu des vues
echo $acceuil->render(); 
// echo $listeUsers;
echo $footerview->render();




?>