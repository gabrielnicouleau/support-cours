<?php
// affichage du lien vers la page de connexion par défault
$nav = "<a href='controller_connexion.php'>Connexion</a>";

// affichage du lien vers la page compte et du bouton déconnexion si un utilisateur est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $nav = "<a href='controller_compte_utilisateur.php'>Mon compte</a><a href=controller_deconnexion.php>Déconnexion</a>";
}
//include de la vue du header
include './view/header_view_acceuil.php';
?>