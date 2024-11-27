USE ticket_caisse;

-- Obtenir les tickets dont le total est supérieur à 10
SELECT pt.id_ticket, SUM(pt.quantite * p.tarif) total FROM produit_ticket AS pt
INNER JOIN produit AS p ON p.id_produit = pt.id_produit
GROUP BY (pt.id_ticket) HAVING total > 10;

-- Obtenir les catégories comportant plus de 2 produits
SELECT c.nom_categorie, count(p.id_produit) nombre_produit FROM categorie AS c
INNER JOIN produit AS p ON c.id_categorie = p.id_categorie
GROUP BY c.nom_categorie HAVING nombre_produit > 2;

-- Obtenir les produits dont la quantité maximum sur un ticket est de 1
SELECT pt.id_ticket, p.nom_produit, MAX(pt.quantite) FROM produit_ticket AS pt -- on peux ensuite passer en DISTINCT et enlever MAX(quantite) et id_ticket pour n'afficher que les produit qui apparaissent en quantitée = 1 au moins une fois
INNER JOIN produit AS p ON p.id_produit = pt.id_produit
GROUP BY pt.id_ticket, p.nom_produit HAVING MAX(pt.quantite) =1;

-- Obtenir les vendeurs qui ont vendus pour un total supérieur ou égal à 50 (ici du plus grand au plus petit)
SELECT v.nom_vendeur, v.prenom_vendeur, SUM(p.tarif * pt.quantite) total FROM vendeur AS v
INNER JOIN ticket AS t ON t.id_vendeur = v.id_vendeur
INNER JOIN produit_ticket AS pt ON pt.id_ticket = t.id_ticket
INNER JOIN produit AS p ON p.id_produit = pt.id_produit
GROUP BY v.nom_vendeur, v.prenom_vendeur HAVING total >= 50 ORDER BY total DESC;