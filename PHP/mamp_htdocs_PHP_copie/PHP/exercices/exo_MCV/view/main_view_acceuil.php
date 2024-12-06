<!--Main de ma page-->
<section>
    <form action="" method="post"> <!-- formulaire d'inscription en BDD-->
        <input type="text" name="name" placeholder="name" required><br>
        <input type="text" name="firstName" placeholder="firstName" required><br>
        <input type="text" name="email" placeholder="email" required><br>
        <input type="password" name="password" placeholder="password" required><br>
        <input type="password" name="passwordValid" placeholder="repeat your password" required><br>
        <input type="submit" name="submitInscription" value="S'inscrire"><br>
    </form>
    <p><?php echo $message; ?></p><br> <!-- message d'enregistrement en BDD ou d'erreur d'enregistrement-->
</section>
<section>
    <h2>Liste d'utilisateurs:</h2>
    <ul>
        <?php echo $listeUsers; ?> <!-- liste des utilisateurs enregistrés en BDD-->
    </ul> 
</section>
