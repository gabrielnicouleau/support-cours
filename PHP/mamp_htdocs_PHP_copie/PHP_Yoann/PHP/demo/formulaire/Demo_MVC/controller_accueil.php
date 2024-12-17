<?php
//IMPORT DES RESSOURCES
include './utils/functions.php';
//Include du model
include './model/model_vendeur.php';

/////////////////////////////////////////
//Declaration des variables d'affichages
/////////////////////////////////////////
$message = "";
$listeVendeurs = "";
$title = "Ma Caisse Enregistreuse";

///////////////////////////////
//AJOUTER UN VENDEUR
///////////////////////////////

// function verifFormInscription(){
//     if(isset($_POST['submitInscription'])){
//         if(!isset($_POST['name']) || empty($_POST['name'])
//         || !isset($_POST['firstname']) || empty($_POST['firstname'])){
//             return "Veuillez remplir tous les champs !";
//         }

//         //Nettoyage des données
//         $name = sanitizeYoyo($_POST['name']);
//         $firstname = sanitizeYoyo($_POST['firstname']);

//         return [$name,$firstname];
//     }else{
//         return '';
//     }
// }

// $result = verifFormInscription();
// if(gettype($result) == "string"){
//     $message = $result;
// }else{
//     //Instancier notre objet de connexion
//     $bdd = connect();

//     $message = addSaler($bdd,$result[0],$result[1]);
// }


//Vérifier que je reçois le formulaire d'incription
if(isset($_POST['submitInscription'])){
    //Vérifie que les données ne sont pas vides
    if(isset($_POST['name']) && !empty($_POST['name'])
    && isset($_POST['firstname']) && !empty($_POST['firstname'])){

            //Nettoyage des données
            $name = sanitizeYoyo($_POST['name']);
            $firstname = sanitizeYoyo($_POST['firstname']);

            //Instancier notre objet de connexion
            $bdd = connect();

            $message = addSaler($bdd,$name,$firstname);
            
    }else{
        $message = "Veuillez remplir tous les champs !";
    }
}

///////////////////////////////
//AFFICHAGE DES VENDEURS
///////////////////////////////
//Récupération des utilisateurs en BDD
//Création l'objet de connexion
$bdd = connect();
$listeVendeurs = readSalers($bdd);

//Include de ma vue de la page d'accueil
include './view/header.php';
include './view/view_accueil.php';
include './view/footer.php';
?>