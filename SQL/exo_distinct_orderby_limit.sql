USE ticket_caisse;

SELECT DISTINCT p.nom_produit FROM produit AS p
INNER JOIN produit_ticket AS pt ON pt.id_produit = p.id_produit
WHERE pt.quantite > 0;

SELECT nom_vendeur, prenom_vendeur FROM vendeur ORDER BY nom_vendeur ASC;

SELECT v.nom_vendeur, v.prenom_vendeur, t.date_creation FROM vendeur AS v
INNER JOIN ticket AS t ON v.id_vendeur = t.id_vendeur 
ORDER BY t.date_creation DESC LIMIT 1;

SELECT nom_produit, tarif FROM produit ORDER BY tarif DESC LIMIT 2;

SELECT nom_produit, tarif FROM produit ORDER BY tarif ASC LIMIT 2;