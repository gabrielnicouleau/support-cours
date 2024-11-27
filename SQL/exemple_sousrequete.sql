USE judoka;

-- inserer un judok dont la couleur de ceinture est noire, 
-- mais on ne connait pas l'id de la donnée couleur_ceinture (id_niveau)
INSERT judoka (nom_judoka, prenom_judoka, age, sexe, id_niveau)
VALUES ('Nicouleau','Gabriel',34,'H',(
SELECT id_niveau FROM niveau WHERE couleur_ceinture = 'noire'));
-- MYSQL va d'abord lancer la sous-requête pour récupérer l'id_niveau 
-- puis va utiliser la valeur récupérée au sein de la requête d'insertion