<?php
//Déclarer les variables à afficher
$message = '';

//Création de la fonction de nettoyage de donnée
function sanitize($data){
    return htmlentities(strip_tags(stripcslashes(trim($data))));
}

//Vérifier que le formulaire : on vérifie que le bouton submit a été cliqué
if(isset($_POST["submit"])){
    //1er ETAPE DE SECURITE : Vérifier que les champs obligatoires sont bien remplis : ici on va dire que seul l'âge n'est pas obligatoire
    if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordVerify']) && !empty($_POST['passwordVerify'])){
        
        //2ND ETAPE DE SECURITE : Vérifier le format des données
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            //Vérifier si l'âge a été entré, si c'est le cas, je vérifie que c'est un entier numérique, ou bien que l'âge n'est pas rempli
            if((!empty($_POST['age']) && filter_var($_POST['age'], FILTER_VALIDATE_INT)) || empty($_POST['age'])){
                //Je vérifie que l'utilisateur a bien entré 2 fois le bon moment
                if($_POST['password'] === $_POST['passwordVerify']){
                    $login = sanitize($_POST['login']);
                    $email = sanitize($_POST['email']);
                    $password = sanitize($_POST['password']);
                    if(!empty($_POST['age'])){
                        $age = sanitize($_POST['age']);
                    }else{
                        $age = null;
                    }

                    //HASHAGE DU MOT DE PASSE
                    $password = password_hash($password,PASSWORD_BCRYPT);

                    //UTILISATION DES DONNEES AVEC UNE BDD
                    //1ER ETAPE : Instanciation de l'objet de connexion à la BDD
                    $bdd = new PDO('mysql:host=localhost;dbname=users3','root' ,'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                    //Try... Catch pour gérer les erreurs de communication avec la BDD
                    try{
                        //2ND ETAPE : ENVOIE DE REQUÊTE SQL
                        //La MAUVAISE méthode qui est une passoir à Injection SQL : la méthode query()
                        
                        //$req = $bdd->query("SELECT * FROM users WHERE login = '$login'");

                        //2ND ETAPE Requête SQL préparée
                        //LA BONNE MANIERE : utilisation de requête préparée avec la méthode prepare()
                        $req = $bdd->prepare("INSERT INTO users (login, email, mdp, age) VALUES (?,?,?,?)");

                        //3EME ETAPE : Compléter les flag ? avec un Binding de Param
                        $req->bindParam(1,$login,PDO::PARAM_STR);
                        $req->bindParam(2,$email,PDO::PARAM_STR);
                        $req->bindParam(3,$password,PDO::PARAM_STR);
                        $req->bindParam(4,$age,PDO::PARAM_INT);

                        //4EME ETAPE : execution de la requête
                        $req->execute();

                        // //5EME Récupération de la réponse de la bdd
                        // //il s'agit d'un tableau contenant les enregistrement sous forme de tableau associatif (ou d'objet)
                        // $data = $req->fetchAll();

                        $message = "Enregistrement effectué avec succès !";

                    }catch(EXCEPTION $error){
                        //En cas de soucis, je récupère le message d'erreur de mon Exception, et je l'affiche
                        $message = $error->getMessage();
                    }


                }else{
                    $message = "Vos 2 mots de passe ne correspondent pas";
                }
                
            }else{//Dans le cas contraire, l'âge a été rempli mais n'est pas au bon format
                $message = "Veuillez rentrer un nombre entier pour votre âge !";
            }

        }else{
            $message = "Votre Email n'est pas au bon format !";
        }

    }else{ //ici on gère le cas d'erreur
        //on affiche un message pour dire que les champs ne sont pa remplis :
        $message = "Veuillez remplir tous les champs obligatoires !";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Mon Formulaire d'Inscription</h1>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="text" name="email" placeholder="Email">
        <!-- Age, non obligatoire -->
        <input type="number" name="age" placeholder="Age">
        <input type="password" name="password" placeholder="Mot de Passe">
        <input type="password" name="passwordVerify" placeholder="Répéter le Mot de Passe">
        <input type="submit" name="submit" value="S'Inscrire">
    </form>
    <p><?php echo $message ?></p>
</body>
</html>