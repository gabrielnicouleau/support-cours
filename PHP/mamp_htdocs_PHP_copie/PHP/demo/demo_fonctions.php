<?php
//FONCTIONS

$screen = "Hello World !"; // on crée la variable
function display($exemple){ // on lui crée une porte d'entrée (comme en JS)
    echo $exemple;
}
display($screen); // et on apelle la variable quand on exécute la fonction
?>

<?php
echo "</br>";
// ou on la déclare à l'intérieur de la fonction pour que le scoop la trouve directement
function display1(){
    $screen = 'Coucou !';
    echo $screen;
}
display1();
?>

<?php // autre exemple
function addition ($a,$b){
    $c = $a + $b;
    return $c;
}

$resultat = addition(1,2);
echo $resultat;
?>

<?php

?>