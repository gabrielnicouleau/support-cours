USE ticket_caisse;

-- Supprimer la catégorie 'Electronique'
DElETE FROM categorie
WHERE nom_categorie = 'Electronique';

-- Supprimer la catégorie 'Jouet'
DELETE FROM produit_ticket -- d'abord dans la table d'association
WHERE id_produit = 10; -- tous les lien de tickets ayant un produits liés à cette quatégorie

DELETE FROM produit  -- ensuite dans la table qui utilise sa clé etrangère
WHERE id_categorie = 5; -- tous les produits liés à cette catégorie

DElETE FROM categorie -- pour finir dans la table où l'on veux la supprimer
WHERE nom_categorie = 'Jouets'; -- cette catégorie

-- Supprimer le vendeur 1
DELETE FROM produit_ticket
WHERE id_ticket = 1;

DELETE FROM ticket
WHERE id_vendeur = 1;

DELETE FROM vendeur
WHERE id_vendeur = 1;

-- Supprimer tous les tickets qui ont une date inférieur au 1er Janvier 2024
DELETE FROM produit_ticket
WHERE id_ticket IN (3,7);

DELETE FROM ticket
WHERE date_creation < '2024-01-01 00:00:00';

-- Supprimer tous les produits de la table Produit_ticket qui ont une quantité supérieur à 9
DELETE FROM produit_ticket
WHERE quantite > 9;