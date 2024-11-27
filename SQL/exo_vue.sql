USE ticket_caisse;

-- Sans utiliser de vue, afficher la somme totale vendue par chaque vendeur
SELECT t.date_creation, SUM(p.tarif * pt.quantite) total FROM ticket AS t
INNER JOIN vendeur AS v ON v.id_vendeur = t.id_vendeur
INNER JOIN produit_ticket As pt ON pt.id_ticket = t.id_ticket
INNER JOIN produit AS p ON p.id_produit = pt.id_produit
GROUP BY t.date_creation,v.nom_vendeur, v.prenom_vendeur;

-- Sans utiliser de vue, afficher le chiffre d'affaire total
SELECT SUM(p.tarif * pt.quantite) chiffre_affaire FROM ticket AS t
INNER JOIN vendeur AS v ON v.id_vendeur = t.id_vendeur
INNER JOIN produit_ticket As pt ON pt.id_ticket = t.id_ticket
INNER JOIN produit AS p ON p.id_produit = pt.id_produit;

-- Créer une Vue qui va afficher les vendeurs (nom et prénom), 
-- les dates de vente de leur ticket, et le total de chaque ticket
CREATE VIEW vue_caissier AS SELECT CONCAT(v.nom_vendeur, v.prenom_vendeur) caissier, t.date_creation, SUM(p.tarif * pt.quantite) total FROM ticket AS t
JOIN vendeur AS v ON v.id_vendeur = t.id_vendeur
JOIN produit_ticket As pt ON pt.id_ticket = t.id_ticket
JOIN produit AS p ON p.id_produit = pt.id_produit
GROUP BY caissier, t.date_creation;

-- Créer une Vue qui va afficher les numéros de tickets, 
-- leur date, les produits, et le total de chaque ticket
CREATE VIEW vue_detail_ticket AS SELECT t.id_ticket,t.date_creation, group_CONCAT(p.nom_produit), SUM(p.tarif * pt.quantite) total FROM ticket AS t
INNER JOIN vendeur AS v ON v.id_vendeur = t.id_vendeur
INNER JOIN produit_ticket As pt ON pt.id_ticket = t.id_ticket
INNER JOIN produit AS p ON p.id_produit = pt.id_produit
GROUP BY t.id_ticket;

-- Avec l'une des vues, afficher la somme totale vendue par chaque vendeur
SELECT caissier, SUM(total) AS total_vendu FROM vue_caissier GROUP BY caissier;

 -- Avec l'une des vues, afficher le chiffre d'affaire total
SELECT SUM(total) AS chiffre_affaire_total FROM vue_caissier;

-- Supprimer la 1er vue
DROP VIEW vue_caissier;