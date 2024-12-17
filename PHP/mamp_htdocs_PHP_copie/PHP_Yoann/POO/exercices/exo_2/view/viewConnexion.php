<main>
    <section>
        <h1>Page de connexion</h1>
<!-- formulaire de connexion-->
        <form action="" method="post"> 
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="email" required><br>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" placeholder="password" required><br>
            <input type="submit" name="submitConnexion" value="Se connecter"><br>
        </form>
<!-- message d'erreur-->
        <p> <?php echo $message ?></p>
    </section>
</main>