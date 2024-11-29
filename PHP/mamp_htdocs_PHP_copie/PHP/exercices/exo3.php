<?php
/* Ecrire un programme qui prend le prix HT d’un article, le nombre d’articles et le taux de TVA, et qui fournit le prix total TTC correspondant.
Afficher le prix HT, le nbr d’articles et le taux de TVA (utilisez la fonction echo),
Afficher le résultat (utilisez la fonction echo).
NB : le calcul du prixTTC est :   prixTTC = prixHT  * quantite * (1 + TVA)    (avec TVA en décimal) */
    $prixHT = 10;
    $TVA = 0.20;
    $quantite = 2;
    $prixTTC = $prixHT * $quantite *(1 + $TVA);
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
        echo "<p> prixHT = $prixHT nombre d'articles = $quantite taux TVA = $TVA </p>";
        echo $prixTTC;
    ?>
    </section>
    <!--<section>
        <form action="submit">
            <label for="nom">Article: </label>
            <input type="text" name="nom">
</br>
            <label for="nombre">nombre d'articles: </label>
            <input type="number" id="nombre" name="nombre">
</br>
            <input type="submit">
    </form>
    <div></div>
    </section>
    <script>
        document.querySelector('form').addEventListener('submit',event => {
            event.preventDefault();
            let quantite = document.querySelector("input[id='nombre']").value;
            console.log(quantite);
        })
        document.querySelector('div').innerText = <?php $prixHT *"quantite"*(1 + $TVA);?>
    </script>-->
</body>
</html>