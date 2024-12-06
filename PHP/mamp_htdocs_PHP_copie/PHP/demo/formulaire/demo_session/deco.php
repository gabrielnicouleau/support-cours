<?php
    //Je démarre ma $_SESSION pour pouvoir y accéder
    session_start();

    //Je détruis la $_SESSION : j'efface ce que j'avais enregistrer dans $_SESSION
    session_destroy();

    //Redirection d'url : me renvoit vers page1.php
    header('Location:page1.php');
    exit;
?>