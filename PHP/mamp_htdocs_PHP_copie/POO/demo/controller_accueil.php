<?php
//inclure mon model
include './model/model_user.php';

/////////////////////////////////////
//Création des Fonctions Utilitaires
/////////////////////////////////////
/*sanitizeYoyo() : enlève les balises HTML, PHP, les espaces et les caractères d'échappement
* Param : $data -> string
* Return : string
*/
function sanitizeYoyo($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}



//je crée un objet ModelUser
$user = new ModelUser();

//j'affiche mon objet
var_dump($user);
echo "<br><br>";

//je récupère les utilisateurs de ma table users du projet Tasks
//Pour cela je prends mon objet ModelUser, et je lui demande de récupérer les donner en utilisant sa méthode readUsers() (voir ModelUser)
$data = $user->readUsers();
var_dump($data);


//Récupérer un utilisateur précis grâce à son mail
//Enregistrer un email dans mon objet
$user->setEmail("depriester.yoann@neuf.fr");
//Je vais récupérer les données liés à cet email
$data = $user->readUserByMail();
//Afficher mes données
echo "<br><br>";
var_dump($data);


//EXEMPLE DE RECUP INFO DEPUIS FORMULAIRE UTILISATEUR
//simulation d'un formulaire renvoyé en POST
$_POST = [
    "submitInscription" => "submit",
    "name" => "Yoyo",
    "firstname" => "Yaya",
    "email"=>"yoyo@gmail.com",
    "password"=>"12345"
];

//Les Etape de base
if(isset($_POST['submitInscription'])){
    //Vérif des champs vide (je mets pas tout pour gagner en temps)
    if(isset($_POST['name']) && !empty($_POST['name'])){
        //Vérif du format
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //Nettoyage des données
            $name = sanitizeYoyo($_POST['name']);
            $firstname = sanitizeYoyo($_POST['firstname']);
            $email = sanitizeYoyo($_POST['email']);
            $password = sanitizeYoyo($_POST['password']);

            //Hashage du mot de passe
            $password = password_hash($password, PASSWORD_BCRYPT);

            //J'instancie mon objet $user
            $user = new ModelUser();

            //Je lui donne les données récoltés
            $user->setName($name)->setFirstname($firstname)->setEmail($email)->setPassword($password);

            //Je lance la méthode approprié pour enregistrer un utilisateur
            //quelque chose du genre $user->addUser()   (à créer dans le ModelUSer)
            

            var_dump($user);
        }
    }
}

?>