<?php
//les tableaux:
//indexés:
$tab = [1,2,3];
//associatifs:
$tabAsso= [
    "cle1" => "valeur1",
    "cle2" => 2,
    "cle3" => true,
    "cle4" => [1,2,3]
];

//accès à une valeur:
//indexés:
echo $tab[0]; //une seule valeur à la fois avec echo
//associatifs:
echo '</br>';

echo $tabAsso['cle1']; // toujours une seule valeur avec echo
//pour afficher plusieurs valeurs:
echo '</br>';

echo $tab[0],$tab[1],$tab[2];
echo '</br>';

echo $tabAsso['cle1'],$tabAsso['cle2'],$tabAsso['cle3'],$tabAsso['cle4'][0],$tabAsso['cle4'][1],$tabAsso['cle4'][2]; // ne pas oublier de préciser l'index du tableau contenu dans la cle4 pour pouvoir l'afficher
echo '</br>';

// ajouter un élément
//indexés:
$tab[] = 10; // se place à la fin du tableau
array_push($tab,20,30,40,50); // fonction pour rentrer plusieurs valeurs à la fin du tableau.

//on peut aussi les placer au début
array_unshift($tab,"new first");

//associatif:
$tabAsso['nouvelleCle'] = 'New Value';

//modification d'un élément d'un tableau:
$tab[0] = "modification";
$tabAsso['cle1'] = "modification";

//supprimer une valeur:
array_pop ($tab); // supprime la dernière valeur
array_shift($tab); // supprime la première valeur

//parcourir un tableau de manière automatique:
//boucle forEache:
foreach($tab as $element){
    echo "$element <br>";
}

foreach($tabAsso as $cle => $valeur){ // pareil pour un tableau associatif
    print_r ("$cle: ").print_r($valeur).print("<br>"); // print_r car le echo ne fonctionne pas à la clé 4 (tableau imbriqué) (sinon utiliser echo "$cle : $valeur <br>";)
}


?>