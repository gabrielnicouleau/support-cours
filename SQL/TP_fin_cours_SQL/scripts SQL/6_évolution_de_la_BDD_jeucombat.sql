USE jeucombat;

-- 12: ajout de la table guilde
CREATE TABLE guilde(
 id_guilde INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 nom_guilde VARCHAR(50) NOT NULL,
 date_creation DATETIME NOT NULL
 )Engine=InnoDB;
 
 ALTER TABLE personnage
 ADD COLUMN id_guilde INT;
 
 ALTER TABLE personnage
 ADD CONSTRAINT fk_appartenir_guilde
 FOREIGN KEY (id_guilde)
 REFERENCES guilde(id_guilde);
 
 -- 13: ajout de la table technique
 CREATE TABLE technique(
 id_technique INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 nom_technique VARCHAR(50) NOT NULL UNIQUE,
 description VARCHAR(255) NOT NULL UNIQUE,
 cout_technique INT NOT NULL,
 id_type_personnages INT
 )Engine=InnoDB;
 
 ALTER TABLE technique
 ADD CONSTRAINT fk_attribuer_type_personnages
 FOREIGN KEY (id_type_personnages)
 REFERENCES type_personnages(id_type_personnages);
 
 -- 14: insertion des données dans la table technique
 INSERT INTO technique (nom_technique,description,cout_technique,id_type_personnages)
 VALUES ("Charge Brutale","Le personnage charge un adversaire à moins de 10m et lui assine un coût dévastateur.",20,1),
		("Riposte","Le personnage retourne la technique utilisée par un adversaire contre ce dernier.",30,2),
		("Grande Parade","Le personnage se met en position défensive. Il ne peut attaquer, mais ne reçoit aucun dégât.",15,3);

-- 15: creation de mon compte et de mon personnage
INSERT INTO carnet_amis (nom_carnet)
VALUES ("les super potos");
INSERT INTO joueurs (pseudo_joueur,mdp_joueur,mail_joueur,id_carnet_amis)
VALUES ("Gabriel","J3D0nn3p4sM0nC0d3","gabriel@mail.com",6);
INSERT INTO personnage (nom_personnage,id_type_personnages,id_joueurs,id_guilde)
VALUES ("Immortal Joe",1,6,null);
INSERT INTO obtenir (id_personnage,id_item,equipe)
VALUES (8,1,0);

-- 16: Rejoignez la liste d'ami de Dark Schneider, et ajoutez le à vote liste d’ami, 
-- et échangez-vous un message (il vous souhaite la bienvenue, et vous lui répondez).
INSERT INTO contenir (id_joueurs,id_carnet_amis)
VALUES (6,1),(1,6);
INSERT INTO messages (id_auteur,id_destinataire,date_message,sujet,message)
VALUES (1,6,"2022-07-29","Bienvenue!","Salut poulet, bienvenue sur le jeu!"),(6,1,"2022-07-29","Re:Bienvenue!","Merci mec. Hâte de débuter!");

-- 17: Dark Schneider, avec son personnage Lars, crée sa guilde 
-- à la date du 29 Juillet 2022 qu'il nomme Metalicanna. 
-- Votre personnage ainsi que Griffith, le personnage du joueur Guts, 
-- rejoignez sa guilde. Mettez à jour les données.
INSERT INTO guilde (nom_guilde,date_creation)
VALUES ("Metalicanna","2022-07-29");

UPDATE personnage SET id_guilde = 1 WHERE nom_personnage = "Lars";
UPDATE personnage SET id_guilde = 1 WHERE nom_personnage = "Griffith";
UPDATE personnage SET id_guilde = 1 WHERE nom_personnage = "Immortal Joe";

-- 18: Affichez le profil de la guilde : 
-- Nom, Date de Création, nombre de membre, nom des membres.
SELECT g.nom_guilde,g.date_creation,COUNT(p.id_personnage)nombre_de_membre,group_CONCAT(p.nom_personnage SEPARATOR ', ')liste_membres FROM guilde AS g
INNER JOIN personnage AS p ON p.id_guilde = g.id_guilde
WHERE p.id_guilde = 1
GROUP BY g.nom_guilde,g.date_creation;

-- 19: A la date du 29 Juillet 2022, vous remportez votre premier combat d'arène contre Kakashi, et obtenez l'item le Marteau de Thor en récompense. 
-- Vous décidez d'en équiper votre personnage. Mettez à jour les données.
INSERT INTO combats (date_combat,id_arene,id_vaincu,id_vainqueur)
VALUES ("2022-07-29",1,5,8);
INSERT INTO obtenir (id_personnage,id_item,equipe)
VALUE (8,(SELECT id_item FROM item WHERE nom_item = "Marteau de Thor"),1);

-- 20: A la date du 01 Août 2022, S'ensuit une série de duel -> Mettez à jour les données :
-- Lars gagne une fois contre Kakashi, et une fois contre Vegeta
-- Griffith gagne une fois contre Vegeta, mais perd une fois contre Kakashi
-- Vous gagnez une fois de plus contre Kakashi, perdez une fois contre Vegeta, et gagnez une fois contre Vegeta
INSERT INTO combats (date_combat,id_arene,id_vaincu,id_vainqueur)
VALUES ("2022-08-01",2,5,7),("2022-08-01",3,4,7),("2022-08-01",1,4,3),("2022-08-01",2,3,5),("2022-08-01",3,5,8),("2022-08-01",1,8,4);

-- 20: Afficher le profil de la guilde Metalicanna, en faisant apparaître son nom de victoire, 
-- et son nombre de défaite (ne comptez que les duels qui ont eu lieu à partir du 29 Juillet 2022)
SET @victoires = (SELECT COUNT(c.id_combats)nombre_victoires FROM combats AS c
INNER JOIN personnage AS p ON p.id_personnage = id_vainqueur
INNER JOIN guilde AS g ON g.id_guilde = p.id_guilde
WHERE g.id_guilde = 1 AND date_combat >= "2022-07-29");

SET @defaites = (SELECT COUNT(c.id_combats)nombre_defaites FROM combats AS c
INNER JOIN personnage AS p ON p.id_personnage = id_vaincu
INNER JOIN guilde AS g ON g.id_guilde = p.id_guilde
WHERE g.id_guilde = 1 AND date_combat >= "2022-07-29");

SELECT nom_guilde,@victoires,@defaites FROM guilde WHERE id_guilde = 1;