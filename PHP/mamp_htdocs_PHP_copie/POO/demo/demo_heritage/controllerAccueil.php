<?php
//include des class
include './modelAnimal.php';
include './modelMammifere.php';

//Créons un chat
$chat = new Mammifere(8,1,"Bloune",4);

var_dump($chat);
echo "<br><br>";
echo $chat->allaiter();
echo "<br><br>";
echo $chat->seNourrir();
echo "<br><br>";

// $chien = Mammifere::buildMammifere("Brun",4,8,1);
// var_dump($chien);
// echo "<br><br>";

// $chiot = $chien->buildMammifere("Blanc",3,8,1);
// var_dump($chiot);
// echo "<br><br>";
?>