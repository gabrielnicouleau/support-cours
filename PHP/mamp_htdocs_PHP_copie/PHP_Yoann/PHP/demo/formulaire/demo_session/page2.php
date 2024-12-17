<?php
//Je démarre ma $_SESSION pour pouvoir y accéder
session_start();
$message ="Coucou";

//Je vérifie qu'il y a une $_SESSION et que le login dans $_SESSION n'est pas vide
if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
    //J'affiche le login de $_SESSION
    $message = $_SESSION['login'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="page1.php">Accueil</a>
    <a href="page2.php">Session</a>
    <a href="deco.php">Deconnexion</a>
    <h1><?php echo $message ?></h1>
</body>
</html>