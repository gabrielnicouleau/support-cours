USE ticket_caisse;

INSERT INTO categorie(nom_categorie)
VALUES('Électronique'),
('Vêtements'),
('Alimentation'),
('Meubles'),
('Jouets');

-- Ajouter des produits
INSERT INTO produit(nom_produit, `description`, tarif, id_categorie)
VALUES
('Lait entier','Lait entier pasteurisé, bouteille de 1 litre.', 1.20, 3),
('Pain de mie', 'Pain de mie tranché, paquet de 500g.', 1.50, 3),
('Pâtes spaghetti','Pâtes spaghetti, paquet de 500g.', 0.90, 3),
('Jus d\'orange', 'Jus d\'orange 100% pur jus, bouteille de 1 litre.',2.00,3),
('Fromage râpé','Fromage râpé, sachet de 200g.',2.50, 3),
('Chemise en lin','Chemise légère en lin, disponible en plusieurs couleurs.',35,2),
('Pantalon chino','Pantalon chino en coton, coupe droite.',40,2),
('Commode en bois','Commode en bois avec 4 tiroirs.', 150 ,4),
('Bureau d\'ordinateur','Bureau d\'ordinateur avec étagères intégrées.',120,4),
('Puzzle 3D','Puzzle 3D de la Tour Eiffel, 500 pièces.',20,5); 

-- Ajouter des vendeurs
INSERT INTO vendeur(prenom_vendeur, nom_vendeur)
VALUES
('Jean', 'Dupont'),
('Marie','Curie'),
('Pierre', 'Martin'),
('Sophie','Durand'),
('Lucien','Bernard');

-- Ajouter 10 tickets de caisse
INSERT INTO ticket(date_creation,id_vendeur)  VALUES
('2024-10-10',1),
('2024-06-02',2),
('2023-08-21',3),
('2024-07-09',3),
('2024-01-02',3),
('2024-09-07',4),
('2023-01-05',4),
('2024-11-12',4),
('2024-11-12',5),
('2024-12-22',5);

-- Assigner 3 produits à chaque tickets
INSERT INTO produit_ticket(id_ticket, id_produit, quantite) VALUES
(1,1,5),(1,2,3),(1,5,8),
(2,1,2),(2,9,3),(2,6,12),
(3,5,3),(3,7,10),(3,6,14),
(4,2,1),(4,9,2),(4,10,8),
(5,1,1),(5,2,2),(5,3,3),
(6,2,2),(6,3,3),(6,4,7),
(7,1,1),(7,2,2),(7,3,3),
(8,1,1),(8,2,2),(8,3,3),
(9,5,5),(9,6,7),(9,4,3),
(10,1,1),(10,2,5),(10,10,5);