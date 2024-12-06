<?php
//Fonctions utiles

//Fonction de nettoyage des données
function sanitize($data){
    return htmlentities(strip_tags(stripcslashes(trim($data))));
};

//fonction de création de l'instance de connexion à la BDD
function connect(){
    $bdd = new PDO('mysql:host=localhost;dbname=task','root' ,'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
};

?>