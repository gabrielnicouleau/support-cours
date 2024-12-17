

    <main>
        <section>
            <h1>Nouveau Vendeur</h1>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Nom">
                <input type="text" name="firstname" placeholder="Prénom">
                <input type="submit" name="submitInscription" value="Ajouter">
            </form>
            <p><?php echo $message ?></p>
        </section>

        <section>
            <h1>Liste des Vendeurs</h1>
            <ul>
                <?php echo $listeVendeurs ?>
            </ul>
        </section>
    </main>
