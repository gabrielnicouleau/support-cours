<?php
// structure des tableaux
$USERS_HUMAN = [[
        "type"=> "humain",
        "name"=> "John Doe",
        "email"=> "j.smith@gmail.com",
        "age"=> 25
    ],
    [
        "type"=> "humain",
        "name"=> "Jane Smith",
        "email"=> "ja.doe@sfr.fr",
        "age"=> 5
    ],
    [
        "type"=> "humain",
        "name"=> "Le Vénérable",
        "email"=> "levy@gmail.com",
        "age"=> 500
    ]
];

$USERS_PET = [[
        "type"=> "animal de compagnie",
        "espece"=> "chien",
        "name"=> "Rox",
        "age"=> 7,
        "propriétaire"=> "John Doe"
    ],
    [
        "type"=> "animal de compagnie",
        "espece"=> "renard",
        "name"=> "Roukie",
        "age"=> 300,
        "propriétaire"=> "Le Vénérable"
    ]
];

$USERS_XENO = [[
        "type"=> "Xeno",
        "espece"=> "Krogan",
        "name"=> "Wrex",
        "menace"=> "Rouge",
        "age"=> 45
    ],
    [
        "type"=> "Xeno",
        "espece"=> "Turien",
        "name"=> "Garrus",
        "menace"=> "Vert",
        "age"=> 35
    ],
    [
        "type"=> "Xeno",
        "espece"=> "Asari",
        "name"=> "Liara",
        "menace"=> "ULTRA Rouge",
        "age"=> 25
    ]
];
?>

<?php
// 1: Créer une variable $tabData et lui assigner un tableau vide.
$tabData= [];

// 2: Ajouter à $tabData les constantes $USERS_HUMAN, $USERS_PET et $USERS_XENO.
array_push($tabData,$USERS_HUMAN,$USERS_PET,$USERS_XENO);

/* 3: Créer la fonction afficherHummain() qui prendra un tableau associatif en paramètre.
Faire en sorte qu'elle affiche le profil d'un humain avec la code HTML suivant :
<article style= 'border-bottom : 3px solid black '>
<h2>nom : nom_de_l'objet</h2>
<p>email : mail_de_l'objet</p>
<p>age : age_de_l'objet ans</p>
</article>
*/
function afficherHumain($humain){

    echo "<article style='border-bottom: 3px solid black'>"; 
    echo "<h2>nom : ".$humain['name']."</h2>"; 
    echo "<p>email : ".$humain['email']."</p>"; 
    echo "<p>age : ".$humain['age']." ans</p>"; 
    echo "</article>";
};
afficherHumain($USERS_HUMAN[0]);

/* 4: Créer la fonction afficherAnimal() qui prendra un tableau associatif en paramètre.
Faire en sorte qu'elle affiche le profil d'un animal sous la forme :
<article style= 'border-bottom : 3px solid black '>
<h2>nom : nom_de_l'objet</h2>
<p>espece : espece_de_l'objet</p>
<p>age : age_de_l'objet ans</p>
<p>propriétaire : propriétaire_de_l'objet</p>
</article>
 */
function afficherAnimal($animal) { 
    echo "<article style='border-bottom: 3px solid black'>"; 
    echo "<h2>nom : ".$animal['name']."</h2>"; 
    echo "<p>espece : ".$animal['espece']."</p>"; 
    echo "<p>age : ".$animal['age']." ans</p>"; 
    echo "<p>propriétaire : ".$animal['propriétaire']."</p>"; 
    echo "</article>"; 
};
afficherAnimal($USERS_PET[0]);

/* 5: Créer la fonction afficherXeno() qui prendra un tableau associatif en paramètre.
Faire en sorte qu'elle affiche dans la console le profil d'un Xéno sous la forme :
<article style= 'border-bottom : 3px solid black '>
<h2>nom : nom_de_l'objet</p>
<p>espece : espece_de_l'objet</p>
<p>age : age_de_l'objet ans</p>
<p>niveau de menace: menace_de_l'objet</p>
</article>
*/
function afficherXeno($xeno) { 
    echo "<article style='border-bottom: 3px solid black'>"; 
    echo "<h2>nom : ".$xeno['name']."</h2>"; 
    echo "<p>espece : ".$xeno['espece']."</p>"; 
    echo "<p>age : ".$xeno['age']." ans</p>"; 
    echo "<p>niveau de menace : ".$xeno['menace']."</p>"; 
    echo "</article>";
};
afficherXeno($USERS_XENO[0]);

/* 6: Créer une fonction profil() qui prend en paramètre un tableau (qui contiendra des tableaux associatifs, à l’image de $USERS_HUMAN).
7: Faire en sorte que la fonction profil() parcourt chaque tableau associatif du tableau en paramètre.
8: Dans la fonction profil(), pour chaque tableau associatif, SI l'objet est de type "humain", appeler la fonction afficherHumain(). SINON SI l'objet est de type "animal de compagnie", appeler la fonction afficherAnimal(). SINON SI l'obet est de type "Xeno", appeler la fonction afficherXeno(). SINON afficher dans la console, le message d'erreur "Type de Profil non Existant".
*/
function profil($tab) { 
    foreach ($tab as $element) { 
        if ($element['type'] === 'humain'){
            afficherHumain($element);
        } elseif ($element['type'] === 'animal de compagnie'){
            afficherAnimal($element); 
        } elseif ($element['type'] === 'Xeno'){
            afficherXeno($element);
        } else { 
            echo "Type de Profil non Existant"; 
        } 
    }
};

// 9: Appeler la fonction profil() sur chacun des tableaux $USERS_HUMAN, $USERS_PET, $USERS_XENO.
profil($USERS_HUMAN);
profil($USERS_PET);
profil($USERS_XENO);

/*10: Créer la fonction profilAll() qui prend en paramètre un grand tableaux constitué de petit tableaux qui sont constitué de tableau associatif (voir la structure de $tabData).
11: Faire en sorte que la fonction profilAll() appelle la fonction profil() sur chaque petit tableau.
*/
function profilAll($tab){
    foreach ($tab as $element) {
        profil($element); 
    } 
};

// 12: Appeler la fonction profilAll() sur le tableau $tabData.
profilAll($tabData);
?>