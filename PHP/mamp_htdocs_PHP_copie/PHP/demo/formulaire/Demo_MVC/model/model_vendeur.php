<?php
//LE MODEL : je possède les fonctions qui communiquent avec la BDD

/**
 * addSaler() : ajoute un vendeur en BDD
 * Param : $bdd -> PDO, $name -> string, $firstname -> string
 * Return : string
 */
function addSaler($bdd,$name,$firstname){
    //Try... Catch() : car je commence à communiquer avec la bdd
    try{
        //Prepare notre requête d'INSERT
        $req = $bdd->prepare('INSERT INTO vendeur (nom_vendeur, prenom_vendeur) VALUES (?,?)');

        //Binding de Param :
        $req->bindParam(1,$name,PDO::PARAM_STR);
        $req->bindParam(2,$firstname,PDO::PARAM_STR);

        //Exécution de la requête
        $req->execute();

        return "$firstname $name a été enregistré avec succès !";        

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}

/**
 * readSalers() : récupérer les id, nom, et prénom des vendeurs de la BDD
 * Param : $bdd -> PDO
 * return : string
 */
function readSalers($bdd){
    //Try...catch()
    try{
        //Requete préparé
        $req = $bdd->prepare('SELECT id_vendeur, nom_vendeur, prenom_vendeur FROM vendeur');

        //Exécution de la requête
        $req->execute();

        //Récupérer la réponse de la bdd : je reçois un tableau contenant des tableaux d'utilisateurs
        $data = $req->fetchAll(PDO::FETCH_ASSOC); //avec PDO::FETCH_ASSOC, je demande à obtenir que des tableaux associatifs pour mes utilisateurs

        //Je parcours mon tableau de donné $data, pour générer l'affichage de chaque utilisateur
        $listeVendeurs = '';

        foreach($data as $vendeur){
            $listeVendeurs = $listeVendeurs."<li>{$vendeur['prenom_vendeur']} {$vendeur['nom_vendeur']}</li>";
        }

        return $listeVendeurs;

    }catch(EXCEPTION $error){
        return $error->getMessage();
    }
}
?>