<?php
//exo 4: Créer une fonction qui soustrait à $a la variable $b (2 paramètres en entrée), la fonction doit renvoyer le résultat de la soustraction $a-$b (return).
function soustraire ($a,$b){
    $c = $b - $a;
    return $c;
}
$result = soustraire(1,2);
echo $result;
?>

<?php
echo "</br>";

//exo 5: Créer une fonction qui prend en entrée un nombre à virgule (float), la fonction doit renvoyer l’arrondi (return) du nombre en entrée.
function arrondir ($nombre){
    return round($nombre); // ou floor (arrondi inférieur) ou seil (arrondi supérieur)
}
$arrondi = arrondir(7.98765);
echo $arrondi;
?>

<?php
echo "</br>";

//exo 6: Créer une fonction qui prend en entrée 3 valeurs et renvoie la somme des 3 valeurs.
function trois_valeurs($premier,$second,$troisieme){
    $somme = $premier + $second + $troisieme;
    return $somme;
}
$rSomme = trois_valeurs(3,5,2);
echo $rSomme;
?>

<?php
echo "</br>";

//exo 7: Créer une fonction qui prend en entrée 3 valeurs et retourne la valeur moyenne des 3 valeurs (saisies en paramètre).
function moyenne($nombre1,$nombre2,$nombre3){
    $mSomme = $nombre1 + $nombre2 + $nombre3;
    $moyenne = $mSomme / 3;
    return $moyenne;
}
$rMoyenne = moyenne(10,20,15);
echo $rMoyenne;
?>