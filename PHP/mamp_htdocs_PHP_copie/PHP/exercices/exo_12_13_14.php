<?php
$tab = [1,2,3,4,5,6];

// exo 12: Créer une fonction qui affiche la valeur la plus grande du tableau.
function valeurMax($tableau) { 
    $valeurMax = max($tableau);
    echo "La valeur la plus grande du tableau est : $valeurMax <br>"; 
};
valeurMax($tab);

// exo 13: Créer une fonction qui affiche la moyenne du tableau.
function afficherMoyenne($tableau) { 
    $somme = array_sum($tableau);
    $nombreElements = count($tableau);
    $moyenne = $somme / $nombreElements;
    echo "La moyenne des valeurs du tableau est : $moyenne <br>"; 
};
afficherMoyenne($tab);

//exo 14: Créer une fonction qui affiche la valeur la plus petite du tableau
function valeurMin($tableau) { 
    $valeurMax = min($tableau);
    echo "La valeur la plus petite du tableau est : $valeurMax <br>"; 
};
valeurMin($tab);

//exo 12 version Algo:
function valeurMaxAlgo($tableau) {
    $valeurMax = $tableau[0];
    foreach ($tableau as $valeur) { 
        if ($valeur > $valeurMax) { 
            $valeurMax = $valeur; 
        }
    } 
    echo "La valeur la plus grande du tableau est : $valeurMax <br>";
    return $valeurMax;
};
valeurMaxAlgo($tab);

//exo 13 version Algo:
function moyenneAlgo($tableau) {
    $somme = 0;
    $nombreElements = 0; 
    foreach ($tableau as $valeur) {
        $somme += $valeur;
        $nombreElements++; 
    }
    $moyenne = $somme / $nombreElements;
    echo "La moyenne des valeurs du tableau est : $moyenne <br>"; 
    return $moyenne;
};
moyenneAlgo($tab);

// exo 14 version ALgo:
function valeurMinAlgo($tableau) { 
    $valeurMin = $tableau[0]; 
    foreach ($tableau as $valeur) { 
        if ($valeur < $valeurMin) { 
            $valeurMin = $valeur; 
        } 
    } 
    echo "La valeur la plus petite du tableau est : $valeurMin <br>";
    return $valeurMin;
};
valeurMinAlgo($tab);
?>