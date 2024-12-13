<section>
    <h1>Inscription d'un utilisateur</h1>
    <form action="" method="post">
        <input type="text" name="pseudo" placeholder="pseudo" required><br>
        <input type="text" name="email" placeholder="email" required><br>
        <input type="score" name="score" placeholder="score" required><br>
        <input type="submit" name="submit" value="Ajouter"><br>
    </form>
    <p><?php echo $message; ?></p><br>
</section>
<section>
    <h2>Liste des utilisateurs:</h2>
    <ul>
        <?php echo $listUsers; ?>
    </ul> 
</section>