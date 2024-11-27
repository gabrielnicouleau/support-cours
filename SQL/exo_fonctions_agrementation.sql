use ticket_caisse;

-- Calculer le nombre de vendeur
SELECT COUNT(id_vendeur) nombre_vendeur FROM vendeur;

--  Calculer le nombre de ticket
SELECT COUNT(id_ticket) nombre_ticket FROM ticket;

-- Calculer le nombre de ticket qu'a vendu chaque vendeur
SELECT COUNT(t.id_ticket) nombre_ticket, v.nom_vendeur, v.prenom_vendeur FROM ticket AS t
INNER JOIN vendeur AS v ON v.id_vendeur = t.id_vendeur
GROUP BY t.id_vendeur ORDER BY nom_vendeur ASC;

-- Calculer la quantite moyenne de produit vendu
SELECT AVG(quantite) FROM produit_ticket;

-- Calculer la quantite moyenne de produit vendu sur chaque ticket
SELECT AVG(quantite), id_ticket FROM produit_ticket GROUP BY id_ticket;

-- Compter le nombre de produit pour chaque catégorie
SELECT COUNT(p.id_produit) nombre_produit, c.nom_categorie FROM produit AS p
INNER JOIN categorie AS c ON c.id_categorie = p.id_categorie
GROUP BY (c.id_categorie);

-- Calculer le prix total de chaque ticket et les classer du plus grand au plus petit
SELECT SUM(p.tarif) prix_total, pt.id_ticket FROM produit_ticket AS pt
INNER JOIN produit AS p ON p.id_produit = pt.id_produit
GROUP BY pt.id_ticket ORDER BY prix_total DESC;
-- SINON (correction) SELECT SUM(quantite * tarif) prix_total, id_ticket FROM produit_ticket INNER JOIN produit ON produit_ticket.id_produit = produit.id_produit GROUP BY id_ticket ORDER BY total DESC;

-- Obtenir le coût moyenne des produits
SELECT AVG(tarif) FROM produit;

-- Trouver le nom du dernier vendeur inscrit (sans ORDER BY, en passant par une fonction d'agrémentation)
SELECT MAX(id_vendeur), nom_vendeur, prenom_vendeur FROM vendeur 
GROUP BY id_vendeur HAVING MAX(id_vendeur) = 5;
-- ou SELECT nom_vendeur, prenom_vendeur FROM vendeur WHERE id_vendeur = (SELECT MAX(id_vendeur) FROM vendeur); --requête imbriquée


-- Trouver le nom du premier vendeur inscrit (sans ORDER BY, en passant par une fonction d'agrémentation)
SELECT MAX(id_vendeur), nom_vendeur, prenom_vendeur FROM vendeur 
GROUP BY id_vendeur HAVING MAX(id_vendeur) = 1;
-- ou SELECT nom_vendeur, prenom_vendeur FROM vendeur WHERE id_vendeur = (SELECT MIN(id_vendeur) FROM vendeur);