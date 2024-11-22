USE ticket_caisse;
-- Ajout de 5 catégories
INSERT INTO categorie(nom_categorie)
VALUES ('hygiène'),('surgelé'),('charcuterie'),('alcool'),('petit-dejeuner');

-- Ajout de 10 produits
INSERT INTO produit(nom_produit,description,tarif,id_categorie)
VALUES ('savon','savon doux à l\'huile d\'amande douce',2.50,1),
('shampoing','shampoing hydratant à l\'aloé-vera',3.00,1),
('poisson pané','le délicieux trésor du captain igloo',4.00,2),
('steack haché','mmmmh charal!',5.30,2),
('saucisson','un délicieux saussicon sec aux noix',4.50,3),
('jambon blanc','4 tranche de jambon de paris',2.00,3),
('biere blonde','une délicieuse biere blonde de caractère',3.00,4),
('vin rouge','vin rouge 75cl appelation corbière',5.50,4),
('biscottes','paquet de 100 biscottes',2.10,5),
('café','un pur arrabica moulu en paquet de 250g',3.50,5);

-- Ajout de 5 vendeurs
INSERT INTO vendeur(nom_vendeur,prenom)
VALUES ('Vaillant','Antoine'),('Leclerc','Léa'),('Dupont','Auguste'),('Lacroix','Didier'),('Audeville','Lara');

-- Ajout de 10 tickets de caisse
INSERT INTO ticket(date_creation,id_vendeur)
VALUES ('2024-10-23 10:00:25',1),('2024-10-23 10:09:01',1),
('2024-10-23 10:01:10',2),('2024-10-23 10:10:20',2),
('2024-10-23 10:02:05',3),('2024-10-23 10:08:55',3),
('2024-10-23 10:01:01',4),('2024-10-23 10:07:47',4),
('2024-10-23 10:02:03',5),('2024-10-23 10:09:56',5);

-- Ajout 3 produits et leur quantité à chaque ticket
INSERT INTO produit_ticket(id_ticket,id_produit,quantite)
VALUES (1,1,1),(1,2,1),(1,10,1),
(2,5,2),(2,6,2),(2,7,6),
(3,3,1),(3,4,1),(3,8,1),
(4,9,1),(4,10,1),(4,1,1),
(5,7,6),(5,8,2),(5,5,1),
(6,1,1),(6,2,1),(6,3,1),
(7,3,1),(7,4,1),(7,6,1),
(8,7,2),(8,8,1),(8,6,1),
(9,10,1),(9,9,1),(9,7,1),
(10,1,1),(10,2,1),(10,10,1);