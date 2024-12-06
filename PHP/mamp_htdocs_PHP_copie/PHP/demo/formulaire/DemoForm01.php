<?php
//Voilà à quoi va ressembler ma super-global $_POST en récupérant les données du formulaire, une fois soumis
// $_POST = [
//     'login' => 'Yoann',
//     'password' => '12345',
//     'submit' => 'submit'
// ]

//Déclaration des mes variables d'affichage
$login = '';
$password = '';
$message = '';


if(isset($_POST['submitConnexion']))//-> je sais que c'est le formulaire de connexion qui a été envoyé
{
    //1er etape : vérifier que mes données en $_POST ne sont pas vide
    //isset() : fonction qui vérifie que la varibale existe et n'est pas NULL
    //empty() : fonction qui vérifie que la variable est vide
    if(isset($_POST['login']) && !empty($_POST['login'])
    && isset($_POST['password']) && !empty($_POST['password'])){

        $login = $_POST['login'];
        $password = $_POST['password'];

    }
}

if(isset($_POST['submitInscription']))//-> je sais que c'est le formulaire d'inscription qui a été envoyé
{
    //Je fais ce que j'ai à faire pour l'inscription
    $message = 'Inscription effectuée avec succès !';
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
    <h2><?php echo $login ?></h2>
    <p>Mot de Passe = <?php echo $password ?></p>

    <h1>Connexion</h1>
    <form action="" method="post">
        <input type="text" name="login">
        <input type="text"name="password">
        <input type="submit" name="submitConnexion">
    </form>

    <h1>Inscription</h1>
    <form action="" method="post">
        <input type="text" name="loginInscription">
        <input type="text"name="passwordInscription">
        <input type="submit" name="submitInscription">
    </form>
    <p><?php echo $message ?></p>
</body>
</html>