<?php
// 20: Créer une page de formulaire dans laquelle on aura 2 champs de formulaire de type nombre.
// Afficher la somme des deux champs avec un affichage du type: La somme est égale à:valeur.
$nombre1 = null;
$nombre2 = null;
$somme = null;

$nombre1 = $_POST['chiffre1']; 
$nombre2 = $_POST['chiffre2'];
$somme = $nombre1 + $nombre2;

if (isset($_POST['submitChiffre'])){
    $message = "La somme est égale à : $somme";
};

// 21: afficher le prix ttc
$prixHT = null;
$tauxTVA = null;
$nombreArticle = null;

$prixHT = $_POST['nombre1']; 
$nombreArticle = $_POST['nombre2'];
$tauxTVA = $_POST['nombre3'];
$prixTTC = $prixHT*(1+$tauxTVA/100)*$nombreArticle;

if (isset($_POST['submitNombre'])){
    $message2 = "Le prix TTC est égal à : $prixTTC €";
};
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
        <form action="" method="post">
        <label for="chiffre1">premier chiffre: </label>
            <input type="number" name="chiffre1"><br>
            <label for="chiffre2">deuxième chiffre: </label>
            <input type="number" name="chiffre2"><br>
            <input type="submit" name="submitChiffre">
        </form>
        <div><p><?php echo $message ?></p></div>
    </section>
    <section>
        <form action="" method="post">
            <label for="nombre1">prix HT: </label>
            <input type="number" name="nombre1"><br>
            <label for="nombre2">nombre produits: </label>
            <input type="number" name="nombre2"><br>
            <label for="nombre3">taux TVA (%): </label>
            <input type="number" name="nombre3"><br>
            <input type="submit" name="submitNombre">
        </form>
        <div><p><?php echo $message2 ?></p></div>
    </section>
</body>
</html>