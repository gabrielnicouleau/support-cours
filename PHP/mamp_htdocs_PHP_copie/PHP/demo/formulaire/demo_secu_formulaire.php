<?php
// vérifier que le formulaire ai été rempli (submit cliqué)
if(isset($_POST['submit'])){

    //1-on vérifier que les champs obligatoires sont bien remplis:
    if(isset($_POST['login']) && !empty($_POST['login'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['password']) && !empty($_POST['password'])){

        //2-vérifier le format des données(filter_var() les filtre selon le format):
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            //vérifier si l'age a été rentré au bon format (INT) ou rempli
            //avec filter_var(): cible ce qu'il faut filtrer 
            //avec FILTER_VALIDATE: filtre la donnée selon son format
            if((!empty($_POST['age']) && filter_var($_POST['age'], FILTER_VALIDATE_INT)) || empty($_POST['age'])){

                //3-nettoyage des données (enlever tout le code malveillant):
                // avec htmlentities(): transforme les balises html en text
                // avec strip_tags(): supprime les balises html et PHP
                // avec trim(): supprime les espaces en debut et fin d'une string
                // avec stripslashes(): supprime les caratères d'échappement ("\")
                $login = htmlentities(strip_tags(stripslashes(trim($_POST['login']))));
                $email = htmlentities(strip_tags(stripslashes(trim($_POST['email']))));
                $password = htmlentities(strip_tags(stripslashes(trim($_POST['password']))));
                if(!empty($_POST['age'])){
                    $age = htmlentities(strip_tags(stripslashes(trim($_POST['age']))));
                }

                //etape bonus - chiffrer les données sensibles (mot de passe)
                // avec password_hash(): permet de hasher le mot de passe
                $password = password_hash($password,PASSWORD_BCRYPT);

                //On peu traiter les données
                //Par exemple, les envoyer en BDD
                $message = "l'enregistrement de $login a été bien effectué! Votre email est: $email et votre MDP a bien été chiffré: $password";

            
            //en cas d'erreur, on affiche un message d'erreur:
            //l'age est rempli mais pas au bon format donc message d'erreur
            }else{
                $message = "Veuillez rentrer un nombre entier pour votre âge!";
            }
        //l'email n'est pas au bon format donc message d'erreur
        }else{
            $message = "votre Email n'est pas au bon format!";
        }
    //les champs obligatoires ne sont pas remplis correctement donc message d'erreur
    }else{
        $message = "Veuillez remplir les champs obligatoires!";
    }
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
            <input type="text" name="login" placeholder="Login" required><br>
            <input type="text" name="email" placeholder="email" required><br>
            <input type="number" name="age" placeholder="age"><br> <!-- Champ pas obligatoire -->
            <input type="password" name="password" placeholder="MDP" required><br>
            <input type="submit" name="submit" value="S'Inscrire">
        </form>
        <div><p><?php echo $message ?></p></div>
    </section>
    
</body>
</html>