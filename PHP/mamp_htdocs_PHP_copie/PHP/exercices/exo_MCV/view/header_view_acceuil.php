<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?php echo $title ?></title> 
    <link rel="stylesheet" href="../src/style/style.css"> 
    <script src="./src/script/script.js" defer></script> 
</head> 
<body> 
    <div> 
        <a href="../controller/controller_acceuil.php">Accueil</a> 
        <?php if (!isset($_SESSION['id'])): ?> 
            <a href="../controller/controller_connexion.php">Connexion</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['id'])): ?> 
            <a href="../controller/controller_compte_utilisateur.php">Mon compte</a> 
            <a href="../controller/deconnexion.php">Déconnexion</a> 
        <?php endif; ?> 
    </div> 
    <header> 
        <h1>DASHBOARD</h1> 
    </header> 