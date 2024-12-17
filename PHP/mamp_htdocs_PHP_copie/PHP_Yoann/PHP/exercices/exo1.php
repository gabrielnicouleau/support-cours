<?php 
/* Créer une variable de type int avec pour valeur 5,
Afficher le contenu de la variable (utilisation de la fonction php echo),
Afficher son type (utilisation de la fonction php gettype),
Créer une variable de type String avec pour valeur votre prénom,
Afficher le contenu de la variable (utilisation de la fonction php echo),
Créer une variable de type booléen avec pour valeur false,
Afficher son type (utilisation de la fonction php gettype). */ 
    $maVariableInt = 5;
    $monPrenom = "Gabriel";
    $booleen = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
    <?php 
        echo $maVariableInt;
        echo "<br>";
        echo gettype ($maVariableInt);
        echo "<br>";
        echo $monPrenom;
        echo "<br>";
        echo gettype ($booleen);


    ?>
    </section>
</body>
</html>