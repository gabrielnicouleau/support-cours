<?php
$name = '';
$content = '';
$prix = '';
$message = '';

function sanitize($data){
    return htmlentities(strip_tags(stripcslashes(trim($data))));
}

if(isset($_POST["submit"])){
    if(isset($_POST['nom_article']) && !empty($_POST['nom_article']) && isset($_POST['contenu_article']) && !empty($_POST['contenu_article']) && isset($_POST['prix_article']) && !empty($_POST['prix_article'])){
        if(filter_var($_POST['prix_article'], FILTER_VALIDATE_FLOAT)){
            $name = sanitize($_POST['nom_article']);
            $content = sanitize($_POST['contenu_article']);
            $prix = sanitize($_POST['prix_article']);
            $bdd = new PDO('mysql:host=localhost;dbname=articles','root' ,'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            try{
                $req = $bdd->prepare("INSERT INTO article (nom_article,description_article, prix_article) VALUES (?,?,?)");
                $req->bindParam(1,$name,PDO::PARAM_STR);
                $req->bindParam(2,$content,PDO::PARAM_STR);
                $req->bindParam(3,$prix,PDO::PARAM_INT);
                $req->execute();
                $message = " Article: $name <br> Description: $content <br> Prix: $prix €";
            }catch(EXCEPTION $error){
                $message = $error->getMessage();
            }
        }else{
            $message = "le prix n'est pas au bon format !";
        } 
    } else{
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
    <section>
        <form action="" method="post">
            <input type="text" name="nom_article" placeholder="nom article" required><br>
            <input type="text" name="contenu_article" placeholder="description article" required><br>
            <input type="number" name="prix_article" step="0.01" placeholder="prix article" required><br>
            <input type="submit" value="Ajouter" name="submit"><br>
        </form>
        <p> <?php echo $message ?> </p>
    </section>
</body>
</html>