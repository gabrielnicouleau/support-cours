<?php
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

/**
 * connect() : crée un objet de connexion à la BDD
 * Param : void
 * Return : object PDO
 */
function connect(){
    $bdd = new PDO('mysql:host=localhost;dbname=tasks','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $bdd;
}

?>