USE jeucombat;

-- modification de la BDD
ALTER TABLE costume ADD COLUMN prix DECIMAL(5,2);
UPDATE costume SET prix = 20 WHERE nom_costume = "La Faucheuse";
UPDATE costume SET prix = 35 WHERE nom_costume = "Le Lapin de Pâque" OR nom_costume = "Phénix";
UPDATE costume SET prix = 15.50 WHERE nom_costume = "La Banchee";
UPDATE costume SET prix = 29.50 WHERE nom_costume = "Jeanne d'Arc";
ALTER TABLE costume MODIFY COLUMN prix DECIMAL(5,2) NOT NULL;

-- insertion des enregistrements d'achats
INSERT INTO achat (date_achat,id_joueurs,id_costume,id_personnage)
VALUES ("2022-05-10",1,1,1),("2022-06-01",1,2,7),("2022-06-21",3,4,3),("2022-06-21",1,3,1),("2022-06-23",3,5,3),("2022-07-03",5,1,5);