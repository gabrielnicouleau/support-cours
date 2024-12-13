<?php
//include de nos ressources:
include './maison.php';
//j'instancie une maison:
$maison = new Maison("La Pension des Mimosas",30,10.5,1);
//J'affiche sa surface avec la methode surface():
$maison->surface();
?>