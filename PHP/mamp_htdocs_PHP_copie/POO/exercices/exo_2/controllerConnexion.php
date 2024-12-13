<?php
session_start();

include './model/ModelUser.php';
// include de mes classes
include './view/viewFooter.php';

$user = new ModelUser($name,$firstname,$email,$password,$id);
$footerview = new ViewFooter(); 

function sanitize($data) {
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

if(isset($_POST["submitConnexion"])){
    // vérifier que les champs obligatoires sont correctement remplis 
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        // vérifier le format du champ dédié à l'email
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            // nettoyage des données
            $password = sanitize($_POST['password']);
            $email = sanitize($_POST['email']);

            $user->setEmail($email)->setPassword($password);
            $data = $user->readUserByMail();
             
                if (!empty($data)) { 
                    if (password_verify($password, $data[0]['mdp_user'])) {
                        $_SESSION['id'] = $data[0]['id_users']; 
                        $_SESSION['name'] = $data[0]['name_user']; 
                        $_SESSION['firstname'] = $data[0]['firstname_user']; 
                        $_SESSION['email'] = $data[0]['email_user'];
                        header('location:index.php'); 
                        exit; 
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

include './controllerHeader.php';
include './view/viewConnexion.php';

echo $footerview->render();
?>
    