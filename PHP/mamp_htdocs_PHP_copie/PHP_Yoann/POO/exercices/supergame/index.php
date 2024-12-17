<?php
//CONTROLER DE LA PAGE D'ACCUEIL

//Importer mes ressources
include './utils/utils.php';
//Import du model
include './model/model_joueurs.php';

//Création d'un objet pour le model
$joueurs = new ModelJoueurs();

//Déclaration de mes variables d'affichages
$message ="";
$listUsers = "";

///////////////////////////////////////////
// ALGO POUR ENREGISTRER UN JOUEUR
///////////////////////////////////////////

//Vérifie si je reçois un formulaire d'ajout
if(isset($_POST['submit'])){
    //Vérifie si les champs sont vides
    if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])
    && isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['score']) && !empty($_POST['score'])){
        //vérifie les formats des données
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            if(filter_var($_POST['score'], FILTER_VALIDATE_INT)){
                //Nettoyage des données
                $pseudo = sanitize($_POST['pseudo']);
                $email = sanitize($_POST['email']);
                $score = sanitize($_POST['score']);

                //J'enregistre les données dans l'objet
                $joueurs->setPseudo($pseudo)->setEmail($email)->setScore($score);

                //Je vais cherche le joueur avec son pseudo
                $data = $joueurs->getJoueurByPseudo();

                //Vérifie si le pseudo est dispo. Si c'est le cas, $data est vide
                if(empty($data)){
                    //Je vais lancer l'enregistrement du joueur
                    $message = $joueurs->addJoueur();

                }else{
                    $message = "Pseudo déjà pris !";
                }

            }else{
                $message = "Score pas au bon format !";
            }

        }else{
            $message = "Email pas au bon format !";
        }

    }else{
        $message = "Veuillez remplir tous les champs !";
    }
}

///////////////////////////////////////////
// ALGO POUR AFFICHER LA LISTE DES JOUEURS
///////////////////////////////////////////

//Lancer la récupération des joueurs dans la bdd
$data = $joueurs->getJoueurs();

//Formatage de l'affichage de chaque joueur
foreach($data as $joueur){
   $listUsers = $listUsers."<li>{$joueur['pseudo']} - {$joueur['email']} : {$joueur['score']}</li>";
}

//Include de mes affichages
include './view/header.php';
include './view/view_accueil.php';
include './view/footer.php';
?>