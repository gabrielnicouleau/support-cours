use ticket_caisse;

-- Exemple d'utilisation de LEFT et RIGHT
INSERT INTO categorie (nom_categorie) VALUES ("Electronique"),("Magique"),("jeux de rôle");

-- je veux l'ensemble des categories et les noms des produits qu'elles contiennent
SELECT nom_categorie, group_CONCAT(nom_produit) liste_produits FROM categorie
LEFT JOIN produit ON categorie.id_categorie = produit.id_categorie
GROUP BY nom_categorie;
-- On obtien tous les résultats placés à gauche de JOIN

SELECT nom_categorie, group_CONCAT(nom_produit) liste_produits FROM categorie
RIGHT JOIN produit ON categorie.id_categorie = produit.id_categorie
GROUP BY nom_categorie;
-- ON obtien tous les résultats placés à droite du JOIN

-- LES VUES
-- ce sont des tables virtuelles qui ne possèdent pas de données
USE judoka;
-- récupérer la liste des judokas
Select * FROM judoka;
-- creation d'une vue
CREATE VIEW vue_judoka AS SELECT * FROM judoka;
-- récupérer la liste des judoka à partir de ma vue vue_judokas
SELECT * FROM vue_judoka; 
-- suppression d'une vue
DROP VIEW vue_judoka;
-- AVANTAGES: se mettent à jour, 
-- permet de mieux gérer les droits utilisateurs sur les différentes tables 
-- et quelle données ont veux afficher dans une vue, 
-- elles permettent entre autre de ne pas toucher aux tables originelles 
-- juste pour afficher une information.

-- On peux faire un insert/update/delete à partir d'une vue 
INSERT INTO vue_judoka (nom_judoka, prenom_judoka, age, sexe, id_niveau)
VALUES ("Lady","Catherine",23,"F",3);
-- à condition que l'on puisse remplir tous les champs NOT NULL de la table originale
-- exemple
CREATE VIEW vue_nom_judokas AS SELECT nom_judoka, prenom_judoka FROM judoka;
-- testons l'insert
INSERT INTO vue_nom_judokas (nom_judoka, prenom_judoka)
VALUES ("Son","Goku");
-- On ne peux pas car on n'a pas tous les champs NOT NULL de la table originale de disponibles (age,sexe,id_niveau).
-- DE ce fait, pour des raisons de sécurité, on crée souvent nos VIEW en ométant des données sciemment ou à partir de requetes complexes (jointures multiples,fonction d'aggrégation et/ou sous-requêtes)

-- creation d'une vue avec des données complexes
CREATE VIEW vue_judoka_compet AS SELECT CONCAT(nom_judoka, prenom_judoka) judoka, age, sexe, couleur_ceinture, nom_cpt, date_debut, date_fin FROM judoka
JOIN niveau ON judoka.id_niveau = niveau.id_niveau
JOIN judoka_competition AS jc ON jc.id_judoka = judoka.id_judoka
JOIN competition ON jc.id_cpt = competition.id_cpt;

-- chercher des infos sur notre dernière vue
SELECT judoka, nom_cpt FROM vue_judoka_compet;
-- la dernière vue va donc nous permettre de faciliter l'écriture de requête pour récupérer des données.