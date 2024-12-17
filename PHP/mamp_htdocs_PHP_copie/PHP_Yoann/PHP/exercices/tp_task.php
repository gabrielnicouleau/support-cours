<?php
$message = '';
$listeUsers = '';
/*sanitize(): enlève les balises HTML, PHP, les espaces et les caractères d'échappement
*Param: $data -> string
*Return : string
*/
function sanitize($data){
    return htmlentities(strip_tags(stripcslashes(trim($data))));
}
// vérifier que le formulaire est validé
if(isset($_POST["submitInscription"])){
    // vérifier que les champs obligatoires sont bien remplis
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['firstName']) && !empty($_POST['firstName']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordValid']) && !empty($_POST['passwordValid'])){
        // vérifier que l'email est dans un format valide
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            // vérifier que le mot de passe est bien validé 2 fois
            if($_POST['password'] === $_POST['passwordValid']){
                $name = sanitize($_POST['name']);
                $firstname = sanitize($_POST['firstName']);
                $password = sanitize($_POST['password']);
                $email = sanitize($_POST['email']);
                $passwordVerify = sanitize($_POST['passewordValid']); // meme si on ne l'utilisera pas pour interagir avec la BDD, on le nettoie pour ne pas laisser de porte d'entrée d'injection SQL
                $password = password_hash($password,PASSWORD_BCRYPT); // on chiffre le MDP
                // Instanciation de l'objet de connexion à la BDD
                $bdd = new PDO('mysql:host=localhost;dbname=task','root' ,'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                try { // je commence à communiquer avec ma BDD
                    // vérifier que le mail n'est pas déja enregistré
                    $req = $bdd->prepare("SELECT email_user FROM users WHERE email_user = ? LIMIT 1");
                    $req->bindParam(1, $email, PDO::PARAM_STR);
                    $req->execute();
                    $result = $req->fetch(PDO::FETCH_ASSOC);
                    // enregistrer le profil en BDD si l'email n'est pas déja utilisé
                    if(empty($result)){
                        // préparation de la requète d'insertion
                        $req = $bdd->prepare("INSERT INTO users (name_user, firstname_user, mdp_user,email_user) VALUES (?,?,?,?)");
                        // Binding de Param
                        $req->bindParam(1,$name,PDO::PARAM_STR);
                        $req->bindParam(2,$firstname,PDO::PARAM_STR);
                        $req->bindParam(3,$password,PDO::PARAM_STR);
                        $req->bindParam(4,$email,PDO::PARAM_STR);
                        //Execution de la requète
                        $req->execute();
                        // Affichage d'un message de confirmation
                        $message = "Bonjour, {$name} {$firstname}, vous avez bien été renregistré en BDD avec l'Email suivant: {$email}";

                        // exo 4 afficher la liste des profils enregistrés(refaire le lien avec la BDD si tu veux le faire apparaitre sur la page et pas après la requète d'insertion)
                        
                    } else{
                        $message = "Cet Email est déja utilisé par un autre compte.";
                    }
                } catch (Exception $error) { 
                    $message = $error->getMessage();
                }
            }else{
                $message = "Vos 2 mots de passe ne correspondent pas";
            }
        }else{
            $message = "Votre Email n'est pas au bon format !";
        }
    }else{
        $message = "Veuillez remplir tous les champs obligatoires !";
    }
};

// exo 4 afficher la liste des profils enregistrés(refaire le lien avec la BDD si tu veux le faire apparaitre sur la page et pas après la requète d'insertion)
// Préparation de la requète de consultation
$bdd = new PDO('mysql:host=localhost;dbname=task','root' ,'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
try{
    // Préparation de la requète de consultation
    $req = $bdd->prepare("SELECT id_users,name_user, firstname_user, email_user FROM users");
    // exécution de la requète
    $req->execute(); 
    // récupération des données de la requète dans une variable
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    // Affichage de la variable dans une boucle récursive pour afficher les données dans une liste
    foreach($data as $user){
        $listeUsers = $listeUsers. "<li>user n°{$user['id_users']}:{$user['name_user']} {$user['firstname_user']}, email: {$user['email_user']}</li>";
    }
} catch (Exception $error) { 
    $message = $error->getMessage();
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <form action="" method="post">
            <input type="text" name="name" placeholder="name" required><br>
            <input type="text" name="firstName" placeholder="firstName" required><br>
            <input type="text" name="email" placeholder="email" required><br>
            <input type="password" name="password" placeholder="password" required><br>
            <input type="password" name="passwordValid" placeholder="repeat your password" required><br>
            <input type="submit" name="submitInscription" value="S'inscrire"><br>
        </form>
        <p><?php echo $message; ?></p><br> <!-- message exo 3-->
        <ul>
            <?php echo $listeUsers; ?> <!-- message exo 4-->
        </ul> 
    </section>
</body>
</html>