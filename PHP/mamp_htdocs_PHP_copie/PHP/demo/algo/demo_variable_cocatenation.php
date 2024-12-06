
<?php // balise php
    /* BLOC DE COMMENTAIRE */
    // ligne de commentaire
    $maVariable = 'Hello Wordl!'; // création d'une variable
    $monTableau = ["Hello World!",42,"la réponse universelle"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello World</h1>
    <section>
        <?php // peut mettre une balise php dans l'HTML
            // echo sert à afficher une valeur primitive (valeur unique)
            echo "bienvenue à Hello Land!"; // ne pas oublier le point virgule
            echo "<p>entrez si vous le souhaitez!</p>"; // peut mettre une balise dans ma commande echo
            echo $maVariable; // apelle de ma variable
        ?>
        <?php
            echo '<h2>'.$maVariable.'On est vendredi.</h2'; // utilisation du point pour concaténer (première méthode)
            echo "<h3> $maVariable </h3>"; // seconde methode (ne marche qu'avec des doubles cotes)
            echo "<h4> {$monTableau[1]}€ Pratiquer les tableaux </h4>"; //troisième methode (utile pour les tableaux multidimensionnels
            getType($maVariable); // retourne le type (sans rien en faire)
            echo getType($maVariable); // afficher la valeur de getType (le type de la variable, ici un string)
            var_dump($monTableau); // affiche tout le contenu de la variable dans le détail
            echo "<br>";
            echo "<br>";
            print_r ($monTableau); // affiche le contenu avec moins de données (plus lisible)
        ?>
    </section>
</body>
</html>