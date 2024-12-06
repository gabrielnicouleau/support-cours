<?php
    //DEMO SELECT en BDD : récupérer des données de ma BDD
    //Declaration de mes variables d'affichae 
    $listeUsers = '';

    //1er Etape : Connexion à la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=users3','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //Try... Catch()
    try{
        //2nd Etape : Preparer la requête SELECT
        $req = $bdd->prepare('SELECT login, email, age FROM users');

        //3eme Etape : exécution de la requête
        $req->execute();

        //4eme Etape : Récupère les données de la BDD
        $data = $req->fetchAll();

        print_r($data);//-> ce qui est envoyé par la BDD est un tableau contenant d'autres petits tableaux. Chaque petit tableau correspond à un enregistrement différent

        //Pour afficher mes $data, créons une boucle sur le tableau pour générer un <li> par enregistrement différent
        foreach($data as $user){
            $listeUsers = $listeUsers . "<li>{$user['login']} : {$user['email']} - {$user['age']} ans</li>";
        }

    }catch(EXCEPTION $error){
        $listeUsers = $error->getMessage();
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
    <h1>Lists des Utilisateurs</h1>
    <ul>
        <?php echo $listeUsers ?>
    </ul>
</body>
</html>