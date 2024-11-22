USE ticket_caisse;
-- Mettre à jour le nom du vendeur 2 par 'Albert'
UPDATE vendeur SET nom_vendeur = 'Albert'
WHERE id_vendeur = 2;
-- Augmenter le tarif de  1 € pour tous les produits dont le tarif est inférieur à 2 €
UPDATE produit SET tarif = tarif + 1
WHERE tarif < 2; -- ou sinon WHERE id_produit IN(1,2) car les deux premiers produits sont concernés
-- modifier le vendeur 2 des tickets de caisse, remplacer le par le vendeur 5
UPDATE ticket SET id_vendeur = 5
WHERE id_vendeur = 2;
-- mettre à jour le nom des categories qui commence parune lettre plus petite que C par nouveau
UPDATE categorie SET nom_categorie = 'Nouveau'
WHERE nom_categorie LIKE ('A%') OR nom_categorie LIKE ('B%'); -- ou (correction): WHERE nom_categorie < 'c'
-- bonus
-- Augmenter la quantité de tous les  produits, pour les tickets du vendeur Sophie Durand  de 3. On ajoute + 3 à la valeur existante.
UPDATE produit_ticket SET quantite = quantite + 3
WHERE id_ticket IN(6,7,8);
-- ou:
-- WHERE id_ticket IN(
-- (SELECT id_ticket FROM ticket INNER JOIN vendeur ON ticket.id_vendeur = vendeur.id_vendeur
-- WHERE nom_vendeur = 'DURAND')
-- ); -- ici on récupère le nom du vendeur à travers l'id vendeur du ticket


-- correction diminiuer le montant de tous les produits de type meuble de 10%
UPDATE produit SET tarif = tarif - (tarif / 10)
WHERE id_categorie = 4;
-- Ajouter 2 jours à tous les tickets dant la date est supérieur au: 1 janvier 2024 (correction)
UPDATE ticket SET date_creation = date_creation + INTERVAL 2 DAY -- (ou HOUR, MONTH, YEAR, etc... selon besoin)
WHERE date_creation > '2024-01-01 00:00:00';
-- 2 autres possibilités:
-- UPDATE ticket SET date_creation = DATE_ADD(date_creation, INTERVAL 2 DAY) WHERE date_creation > '2024-01-01';
-- UPDATE ticket SET date_creation = ADDDATE(date_creation, INTERVAL 48 HOUR) WHERE date_creation > '2024-01-01';