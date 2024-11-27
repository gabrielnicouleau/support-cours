use ticket_caisse;

-- Afficher la liste des tickets de 2024 (id_ticket et la date_creation)
SELECT id_ticket AS n°, date_creation FROM ticket Where date_creation >= '2024-01-01';

-- Afficher la liste des produits de type 'Alimentation'' (id_produit, nom_produit, tarif)
SELECT p.id_produit, p.nom_produit, p.tarif FROM produit AS p
WHERE p.id_categorie = 3;

-- Afficher la liste des produits dont le tarif est supérieur à 2 € (id_produit, nom_produit, tarif, nom_categorie)
SELECT p.id_produit, p.nom_produit, p.tarif, c.nom_categorie FROM produit AS p
INNER JOIN categorie AS c
ON p.id_categorie = c.id_categorie
WHERE p.tarif > 2;

-- Afficher la liste des produits de type 'Alimentation' (nom_produit, tarif, nom_category)
SELECT p.nom_produit, p.tarif, c.nom_categorie FROM produit AS p
INNER JOIN categorie AS c
ON p.id_categorie = c.id_categorie
WHERE c.nom_categorie = 'Alimentation';

-- Bonus
-- Afficher la liste des produits dont le nom est inférieur à J et dont le prix est supérieur à 1.50 € (id_produit, nom_produit, tarif)
SELECT id_produit, nom_produit, tarif FROM produit
WHERE nom_produit < 'J' AND tarif > 1.50;

-- Afficher les tickets de 2023 (id_ticket, date_creation, nom_vendeur, prenom_vendeur)
SELECT t.id_ticket, t.date_creation, v.nom_vendeur, v.prenom_vendeur FROM ticket AS t
INNER JOIN vendeur AS v
ON t.id_vendeur = v.id_vendeur
WHERE t.date_creation LIKE ('2023%');

-- Afficher les 5 produits les plus cher (id_produit, nom_produit, tarif)
SELECT id_produit, nom_produit, tarif FROM produit ORDER BY tarif DESC LIMIT 5;

-- EXO  Consultation et Jointure:
-- Afficher la liste des produits vendu sur le ticket : 1 (nom_produit, tarif, quantite)
SELECT p.nom_produit, p.tarif, pt.quantite FROM produit_ticket AS pt
INNER JOIN produit AS p ON pt.id_produit = p.id_produit
WHERE pt.id_ticket = 1;

-- Afficher la liste des produits vendu en 2024 (nom_produit, tarif, nom_categorie)
SELECT p.nom_produit, p.tarif, c.nom_categorie FROM produit AS p
INNER JOIN categorie AS c ON c.id_categorie = p.id_categorie
INNER JOIN produit_ticket AS pt ON pt.id_produit = p.id_produit
INNER JOIN ticket AS t ON t.id_ticket = pt.id_ticket
WHERE t.date_creation >= '2024-01-01'
GROUP BY p.id_produit;

-- Afficher la liste des produits vendu par le vendeur : 4 (nom_produit, tarif, nom_vendeur, prenom_vendeur)
SELECT p.nom_produit, p.tarif, v.nom_vendeur, v.prenom_vendeur AS cnt FROM produit AS p 
INNER JOIN produit_ticket AS pt ON pt.id_produit = p.id_produit
INNER JOIN ticket AS t ON t.id_ticket = pt.id_ticket
INNER JOIN vendeur AS v ON v.id_vendeur = t.id_vendeur
WHERE v.id_vendeur = 4
GROUP BY pt.id_produit;

-- Afficher la liste des produits de type Alimentation vendu (nom_produit, tarif, nom_categorie)
SELECT DISTINCT p.nom_produit, p.tarif, c.nom_categorie FROM ticket AS t
INNER JOIN produit_ticket AS pt ON pt.id_ticket = t.id_ticket
INNER JOIN produit AS p ON p.id_produit = pt.id_produit
INNER JOIN categorie AS c ON c.id_categorie = p.id_categorie
WHERE c.nom_categorie = 'Alimentation';