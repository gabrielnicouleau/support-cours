USE ticket_caisse;

-- Ajouter 1 produits, en remplissant la clé étrangère id_categorie 
-- en utilisant une sous-requête visant à l'obtenir à partir du nom d'une catégorie
INSERT INTO produit (nom_produit,description,tarif,id_categorie)
VALUE ('sauce tomate','la super sauce de panzanni',2,
(SELECT id_categorie FROM categorie WHERE nom_categorie = 'Alimentation'));

-- Ajouter une vente de ce produit effectuée par le premier vendeur inscrit 
-- en utilisant des sous-requête pour remplir les clés étrangères
INSERT INTO ticket (date_creation,id_vendeur)
VALUE ('2024-11-27',
(SELECT id_vendeur FROM vendeur WHERE nom_vendeur = 'Dupont' AND prenom_vendeur = 'Jean'));
-- peux utiliser (SELECT id_vendeur FROM vendeur ORDER BY id_vendeur LIMIT 1)
-- ou (SELECT MIN(id_vendeur) FROM vendeur)

INSERT INTO produit_ticket (quantite,id_ticket,id_produit)
VALUES (1,
(SELECT id_ticket FROM ticket WHERE date_creation = '2024-11-27' AND id_vendeur = 1),
(SELECT id_produit FROM produit WHERE nom_produit = 'sauce tomate'));
-- pour l'id_ticket, on peux aussi utiliser (SELECT MAX(id_ticket) FROM ticket)

-- Supprimer les catégories qui ne sont liés à aucun produit
DELETE FROM categorie WHERE id_categorie NOT IN (SELECT DISTINCT id_categorie FROM produit);

-- Modifier la date des tickets dont le total est supérieur à 80 pour le 31/12/2024
UPDATE ticket SET date_creation = '2024-12-31' 
WHERE id_ticket IN (SELECT produit_ticket.id_ticket FROM produit_ticket 
INNER JOIN produit ON produit_ticket.id_produit = produit.id_produit 
GROUP BY produit_ticket.id_ticket HAVING SUM(produit_ticket.quantite * produit.tarif) > 80);