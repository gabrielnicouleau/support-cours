<?php
// exo 8:
$nombre = 0;
function testPositivite($exemple){
    if($exemple > 0){
        echo '$nombre est positif';
    } elseif ($exemple < 0) {
        echo '$nombre est negatif';
    } elseif ($exemple == 0) {
        echo '$nombre est positif et negatif à la fois';
    }else {
        echo '$nombre n\'est pas défini';
    }
}
testPositivite($nombre);

echo '</br>';

// exo 9:
$a = 1;
$b = 2;
$c = 3;

function plusgrand($ex1,$ex2,$ex3){

    //vérification du format
    if((gettype($ex1)!=="integer" and gettype($ex1)!=="double") or (gettype($ex2)!=="integer" and gettype($ex2)!=="double") or (gettype($ex3)!=="integer" and gettype($ex3)!=="double")){
        echo "<p> tous les paramètres ne sont pas des nombres</p>";
        return;
    // et maintenant on ecrit la fonction
    }elseif($ex1 >= $ex2 and $ex1 >= $ex3){
        echo "le nombre le plus grand est: {$ex1}.";
    } elseif($ex2 >= $ex3){
        echo "le nombre le plus grand est: {$ex2}.";
    } else {
        echo "le nombre le plus grand est: {$ex3}.";
    } 
}
plusgrand($a,$b,$c);

echo '</br>';

//exo 10:
function plusPetit($ex1,$ex2,$ex3){
    if((gettype($ex1)!=="integer" and gettype($ex1)!=="double") or (gettype($ex2)!=="integer" and gettype($ex2)!=="double") or (gettype($ex3)!=="integer" and gettype($ex3)!=="double")){
        echo "<p> tous les paramètres ne sont pas des nombres</p>";
        return;
    }elseif($ex1 <= $ex2 and $ex1 <= $ex3){
        echo "le nombre le plus petit est: {$ex1}.";
    } elseif($ex2 <= $ex3){
        echo "le nombre le plus petit est: {$ex2}.";
    } else {
        echo "le nombre le plus petit est: {$ex3}.";
    } 
}
plusPetit($a,$b,$c);

echo '</br>';

//exo 11:
$age = 10;
function categorie($nombre){
    if((gettype($nombre)!=="integer" and gettype($nombre)!=="double")){
        echo "<p>l'age rentré n'est pas valide</p>";
        return;
    } elseif($nombre >= 6 and $nombre < 8){
        echo "Poussin";
    } elseif($nombre >= 8 and $nombre < 10){
        echo "Pupille";
    } elseif($nombre >= 10 and $nombre < 12){
        echo "Minime";
    } elseif($nombre >= 12){
        echo "Cadet";
    } else {
        echo "HORS CATEGORIE";
    }
}
categorie($age);

echo '</br>';

//bonus 
function categorieSwitch($nombre){
    switch(true){
        case $nombre >= 6 and $nombre < 8:
            echo "Poussin";
            break;
            case $nombre >= 8 and $nombre < 10:
            echo "Pupille";
            break;
            case $nombre >= 10 and $nombre < 12:
            echo "Minime";
            break;
        case $nombre >= 12:
            echo "Cadet";
            break;
        default:
            echo "HORS CATEGORIE";
            break;
    }
}
categorieSwitch($age);

?>