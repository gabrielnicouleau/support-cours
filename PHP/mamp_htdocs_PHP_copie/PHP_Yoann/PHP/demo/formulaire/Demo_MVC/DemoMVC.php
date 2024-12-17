<!-- DEMO MVC : Caisse Enregistreuse -->

<?php
/////////////////////////////////////////
//Declaration des variables d'affichages
/////////////////////////////////////////
$message = "";
$listeVendeurs = "";

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

///////////////////////////////
//AJOUTER UN VENDEUR
///////////////////////////////
//Vérifier que je reçois le formulaire d'incription
if(isset($_POST['submitInscription'])){
    //Vérifie que les données ne sont pas vides
    if(isset($_POST['name']) && !empty($_POST['name'])
    && isset($_POST['firstname']) && !empty($_POST['firstname'])){

            //Nettoyage des données
            $name = sanitizeYoyo($_POST['name']);
            $firstname = sanitizeYoyo($_POST['firstname']);

            //Instancier notre objet de connexion
            $bdd = new PDO('mysql:host=localhost;dbname=caisse','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            //Try... Catch() : car je commence à communiquer avec la bdd
            try{
                                        
                //On commence à enregistrer le compte, car l'email disponible

                //Prepare notre requête d'INSERT
                $req = $bdd->prepare('INSERT INTO vendeur (nom_vendeur, prenom_vendeur) VALUES (?,?)');

                //Binding de Param :
                $req->bindParam(1,$name,PDO::PARAM_STR);
                $req->bindParam(2,$firstname,PDO::PARAM_STR);

                //Exécution de la requête
                $req->execute();

                $message = "$firstname $name a été enregistré avec succès !";        

            }catch(EXCEPTION $error){
                $message = $error->getMessage();
            }

    }else{
        $message = "Veuillez remplir tous les champs !";
    }
}

///////////////////////////////
//AFFICHAGE DES VENDEURS
///////////////////////////////
//Récupération des utilisateurs en BDD
//Création l'objet de connexion
$bdd = new PDO('mysql:host=localhost;dbname=caisse','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//Try...catch()
try{
    //Requete préparé
    $req = $bdd->prepare('SELECT id_vendeur, nom_vendeur, prenom_vendeur FROM vendeur');

    //Exécution de la requête
    $req->execute();

    //Récupérer la réponse de la bdd : je reçois un tableau contenant des tableaux d'utilisateurs
    $data = $req->fetchAll(PDO::FETCH_ASSOC); //avec PDO::FETCH_ASSOC, je demande à obtenir que des tableaux associatifs pour mes utilisateurs

    //Je parcours mon tableau de donné $data, pour générer l'affichage de chaque utilisateur
    foreach($data as $vendeur){
        $listeVendeurs = $listeVendeurs."<li>{$vendeur['prenom_vendeur']} {$vendeur['nom_vendeur']}</li>";
    }

}catch(EXCEPTION $error){
    $listeVendeurs = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caisse Enregistreuse</title>
    <link rel="stylesheet" href="./src/style/style.css">
</head>
<body>
    <header>
        <h1>DASHBOARD</h1>
    </header>

    <main>
        <section>
            <h1>Nouveau Vendeur</h1>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Nom">
                <input type="text" name="firstname" placeholder="Prénom">
                <input type="submit" name="submitInscription" value="Ajouter">
            </form>
            <p><?php echo $message ?></p>
        </section>

        <section>
            <h1>Liste des Vendeurs</h1>
            <ul>
                <?php echo $listeVendeurs ?>
            </ul>
        </section>
    </main>

    <footer>

    </footer>
</body>
</html>