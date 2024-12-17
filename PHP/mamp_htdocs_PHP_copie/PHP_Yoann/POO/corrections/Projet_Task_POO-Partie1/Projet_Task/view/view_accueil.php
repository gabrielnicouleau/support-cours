<main>
        <section>
            <h1>Nouvel Utilisateur</h1>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Votre Nom">
                <input type="text" name="firstname" placeholder="Votre Prénom">
                <input type="text" name="email" placeholder="Votre Email">
                <input type="text" name="password" placeholder="Votre Mot de Passe">
                <input type="text" name="passwordVerify" placeholder="Retappez votre Mot de Passe">
                <input type="submit" name="submitInscription" value="S'Inscrire">
            </form>
            <p><?php echo $message ?></p>
        </section>

        <section>
            <h1>Liste des Utilisateurs</h1>
            <ul>
                <?php echo $listeUsers ?>
            </ul>
        </section>
    </main>