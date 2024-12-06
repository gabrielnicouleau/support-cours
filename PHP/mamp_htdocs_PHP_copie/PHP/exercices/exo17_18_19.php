<?php
// exo 17: créer une fonction qui affiche chaque case d'un tableau
$tab = [1,2,3,4,5];

function cases($tableau) { 
    foreach ($tableau as $valeur) {
        echo $valeur."<br>"; 
    } 
};
/*
ou utiliser dans la fonction : 
for ($i =0; $i < sizeof($tab); $i++){   sizeof() est plus performant et equivaut à .lenght en JS
    echo $tab[$i];
}
*/
cases($tab);

// exo 18: Créer une fonction qui prend un tableau contenant des tableau. Par exemple : La fonction affichera chaque petit tableau grâce à un print_r()
$bigTab = [[1,2,3],[4,5,6],[7,8,9]];

function tabDansTab($bigTab) {
    foreach ($bigTab as $petitTableau) {
        print_r($petitTableau); 
        echo "<br>";
    } 
};
tabDansTab($bigTab);

//  exo 19: Reprenez le gros tableau précédent ($bigTab) Créer une fonction qui affiche chaque nombre contenu dans chaque petit tableau.
function displayEachNumber($tab) { 
    foreach ($tab as $petitTab) { 
        foreach ($petitTab as $nbr) { // utilisation d'une boucle imbriquée
            echo $nbr."<br>"; 
        }
    }
};
displayEachNumber($bigTab);
?>