<?php
//exo 15: Créer un script qui affiche les nombres de 1 -> 5 (méthode echo)
for ($i = 1; $i <= 5; $i++) { 
    echo "$i <br>"; 
};

//exo 16:Ecrire une fonction qui prend un nombre en paramètre (variable $nbr), et qui ensuite affiche les dix nombres suivants. Par exemple, si la valeur de nbr équivaut à : 17, la fonction affichera les nombres de 18 à 27 (méthode echo).

function lesDixSuivants($nbr){
    for ($i = 1; $i <= 10; $i++) {
        echo ($nbr + $i)."<br>"; 
    }
};
lesDixSuivants(5);
?>