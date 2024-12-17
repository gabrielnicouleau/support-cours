<!-- VUE DE LA PAGE D'ACCUEIL -->
<section>
    <h1>Inscription d'un Utilisateur</h1>
    <form action="" method="post">
        <input type="text" name="pseudo" placeholder="Votre Pseudo">
        <input type="text" name="email" placeholder="Votre Email">
        <input type="number" name="score" placeholder="Votre Score">
        <input type="submit" name="submit" value="Ajouter">
    </form>
    <p><?php echo $message; ?></p>
</section>
<section>
    <h1>Liste des Utilisateurs</h1>
    <ul>
        <?php echo $listUsers; ?>
    </ul>
</section>

    